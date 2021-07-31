<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Poster;
use Illuminate\Http\Resources\Json\JsonResource;

class PosterResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Poster $this */
        return [
            'id' => $this->id,
            'movie_id' => $this->movie_id,
            'path' => $this->path,
        ];
    }
}