<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\UnreachableMoviesException;
use App\Repositories\Contracts\MovieRepository;

class MovieService
{
    private const BASE_URI = 'http://www.omdbapi.com/?s=';
    private const API_KEY = '720c3666';

    public function __construct(
        private Client $client,
        private MovieRepository $movieRepository,
    ) {}

    public function fetchMovies(string $query): array
    {
        try {
            $request = $this->client->get($this->buildUri($query));
            $response = json_decode($request->getBody()->getContents(), true);
            $stack = [];
            foreach ($response['Search'] as $item) {
                $stack[] = $this->hydrateFrom($item);
            }
            return $stack;
        } catch (GuzzleException) {
            throw new UnreachableMoviesException("Couldn't fetch movies. Unreachable endpoint.");
        }
    }

    private function buildUri(string $query): string
    {
        return self::BASE_URI . $query . '&apikey=' . self::API_KEY;
    }

    private function hydrateFrom(array $item): Movie
    {
        $slug = Str::slug($item['Title']); // Generating slug from title.

        if (($movie = $this->movieRepository->findBySlug($slug))) {
            return $movie;
        }

        $movie = $this->movieRepository->store(Movie::from([
            'slug'    => $slug,
            'title'   => $item['Title'],
            'year'    => $item['Year'],
            'imdbId'  => $item['imdbID'],
            'type'    => $item['Type'],
        ]));

        if (isset($item['Poster']) && $item['Poster'] !== 'N/A') {
            $movie->poster()->create(['path' => $item['Poster']]);
        }

        return $movie;
    }
}