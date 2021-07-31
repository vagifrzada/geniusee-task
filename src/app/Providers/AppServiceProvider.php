<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MovieEloquentRepository;
use App\Repositories\Contracts\MovieRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MovieRepository::class, fn () => new MovieEloquentRepository());
    }
}
