<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Movie;

interface MovieRepository
{
    public function findBySlug(string $slug): ?Movie;

    public function store(Movie $movie): Movie;
}