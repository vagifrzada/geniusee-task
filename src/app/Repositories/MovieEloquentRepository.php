<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Movie;
use RuntimeException;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Contracts\MovieRepository;

class MovieEloquentRepository implements MovieRepository
{
    public function query(): Builder
    {
        return Movie::query();
    }

    public function findBySlug(string $slug): ?Movie
    {
        /** @var Movie|null $movie */
        $movie = $this->query()->where(['slug' => $slug])->first();
        return $movie;
    }

    public function store(Movie $movie): Movie
    {
        if (!$movie->save()) {
            throw new RuntimeException("Can't save movie.");
        }
        return $movie;
    }
}