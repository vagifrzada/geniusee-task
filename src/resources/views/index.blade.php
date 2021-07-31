@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Geniusee test task</h1>
        <hr>
        <div class="row">
            <div class="col col-lg-4">
                <button class="btn btn-success" data-query="Matrix">
                    Matrix
                </button>
                <button class="btn btn-primary" data-query="Matrix%20Reloaded">
                    Matrix Reloaded
                </button>
                <button class="btn btn-danger" data-query="Matrix%20Revolutions">
                    Matrix Revolutions
                </button>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col col-lg-6">
               <div id="movie-container"></div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="/js/movies.js"></script>
@endpush