@extends('layouts.app')

@section('title')
    {{ $vinyl->title }} - {{ $vinyl->release_year }}
@endsection

@section('content')
    <div class="container">
        <div class="row my-5 py-5 text-light">
            <div class="col-12 col-lg-4">
                <img src="{{ Vite::asset('resources/img/logo/vinylcollector-black-disc.png') }}" alt="">
            </div>
            <div class="col-12 col-lg-8 ps-3">
                <h4 class="mb-5">{{ $vinyl->title }} - {{ $vinyl->artist }}</h4>

                <div>
                    <span class="vinyl-card-label">Year:</span>{{ $vinyl->release_year }}
                </div>
                <div>
                    <span class="vinyl-card-label">Genre:</span>{{ 'Random Genre' }}
                </div>
                <div>
                    <span class="vinyl-card-label">Label:</span>{{ 'Random Label' }}
                </div>

                <div class="mt-5">
                    <span class="vinyl-card-label">Country:</span>{{ $vinyl->country }}
                </div>
                <div>
                    <span class="vinyl-card-label">Catalog #:</span>{{ $vinyl->catalog_number }}
                </div>

                <div class="mt-5">
                    <a href="{{ route('vinyls.index') }}">Go back ↺</a>
                </div>
            </div>
        </div>
    </div>
@endsection
