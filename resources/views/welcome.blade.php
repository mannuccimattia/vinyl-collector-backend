@extends('layouts.app')

@section('title')
    Home | Vinyl Collector
@endsection

@section('content')
    <div class="container">
        <div class="row my-4 text-light flex-column gap-3">
            <h1> Title </h1>
            <div class="col-5">
                <a href="{{ route('vinyls.index') }}" class="card dark rounded-pill border-black text-decoration-none">
                    <div class="card-content d-flex align-items-center justify-content-between">
                        <img class="img-fluid welcome-card-image"
                            src="{{ Vite::asset('resources/img/logo/vinylcollector-black-disc.png') }}" alt="">
                        <h3 class="pe-3">Vinyls</h3>
                    </div>
                </a>
            </div>

            <div class="col-5">
                <a href="{{ route('labels.index') }}" class="card dark rounded-pill border-white text-decoration-none">
                    <div class="card-content d-flex align-items-center justify-content-between">
                        <img class="img-fluid welcome-card-image"
                            src="{{ Vite::asset('resources/img/logo/vinylcollector-white-disc.png') }}" alt="">
                        <h3 class="pe-3">Labels</h3>
                    </div>
                </a>
            </div>

            <div class="col-5">
                <a href="" class="card dark rounded-pill border-black text-decoration-none">
                    <div class="card-content d-flex align-items-center justify-content-between">
                        <img class="img-fluid welcome-card-image"
                            src="{{ Vite::asset('resources/img/logo/vinylcollector-black-disc.png') }}" alt="">
                        <h3 class="pe-3">Genres</h3>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
