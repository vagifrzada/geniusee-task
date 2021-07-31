<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Movie;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Movie $this */
        return [
            'id'      => $this->id,
            'slug'    => $this->slug,
            'title'   => $this->title,
            'year'    => $this->year,
            'imdbId'  => $this->imdb_id,
            'type'    => $this->type,
            'poster'  => new PosterResource($this->poster),
        ];
    }
}