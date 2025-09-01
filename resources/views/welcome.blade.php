@extends('layouts.app')

@section('title')
    Home | Vinyl Collector
@endsection

@section('content')
    <div class="container">
        <div class="row my-4 py-4 text-light gap-3 justify-content-between">
            <div class="col-12 col-xl-auto">
                <a class="card text-decoration-none border-0 welcome-card vinyls">
                    <h3 class="text-light bottom-corner">Vinyls</h3>
                </a>
            </div>

            <div class="col-12 col-xl-auto">
                <a class="card text-decoration-none border-0 welcome-card labels">
                    <h3 class="text-light bottom-corner">Labels</h3>
                </a>
            </div>

            <div class="col-12 col-xl-auto">
                <a class="card text-decoration-none border-0 welcome-card genres">
                    <h3 class="text-light bottom-corner">Genres</h3>
                </a>
            </div>

        </div>
    </div>
@endsection
