@extends('layouts.app')

@section('title')
    Home | Vinyl Collector
@endsection

@section('content')
    <div class="container">
        <div class="mt-5 pt-5 no-margin-lg">

            <div class="row mt-5 pt-5 no-margin-lg text-light gap-3 justify-content-around">
                <div class="col-12 col-xl-auto mt-2">
                    <a href="{{ route('vinyls.index') }}" class="card text-decoration-none border-0 welcome-card vinyls">
                        <h3 class="text-light bottom-corner">Vinyls</h3>
                    </a>
                </div>

                <div class="col-12 col-xl-auto">
                    <a href="{{ route('labels.index') }}" class="card text-decoration-none border-0 welcome-card labels">
                        <h3 class="text-light bottom-corner">Labels</h3>
                    </a>
                </div>

                <div class="col-12 col-xl-auto">
                    <a href="{{ route('genres.index') }}" class="card text-decoration-none border-0 welcome-card genres">
                        <h3 class="text-light bottom-corner">Genres</h3>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
