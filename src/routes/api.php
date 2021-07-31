<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->get('/fetch-movies', [
   'as' => 'movies', 'uses' => 'MovieController@handle',
]);
