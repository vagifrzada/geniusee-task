<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Throwable;
use Illuminate\Http\Request;
use App\Services\MovieService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MovieController extends Controller
{
    public function __construct(
        private MovieService $movieService,
    ) {}

    public function handle(Request $request): ResourceCollection|JsonResponse
    {
        try {
            $this->validate($request, ['q' => 'required|string']);
            return MovieResource::collection(
                $this->movieService->fetchMovies($request->get('q'))
            );
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}