@extends('layouts.app')

@section('title')
    Index | Vinyls
@endsection

@section('content')
    <div class="container">
        <div class="row my-4 text-light gap-3 align-items-center">
            <div class="col-5">
                <h2>My collection</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vinyls.create') }}">Add new vinyl</a>
            </div>

            @foreach ($vinyls as $vinyl)
                <div class="col-12">
                    <a href="{{ route('vinyls.show', $vinyl->id) }}"
                        class="card dark card-link flex-row gap-3 h-100 text-decoration-none">
                        <img src="{{ $vinyl->cover ? asset('storage/' . $vinyl->cover) : Vite::asset('resources/img/logo/vinylcollector-black-disc.png') }}"
                            alt="cover of the album {{ $vinyl->title }}" class="img-fluid vinyl-card-img rounded-start">
                        <div class="wrapper d-flex flex-column py-2 justify-content-around flex-fill">
                            <div>
                                <h5>
                                    {{ $vinyl->artist }} - {{ $vinyl->title }}
                                </h5>
                            </div>
                            <div>
                                <div class="d-flex">
                                    <span class="vinyl-card-label">Label:</span>
                                    <span>{{ $vinyl->label->name }}</span>
                                </div>
                                <div class="d-flex">
                                    <span class="vinyl-card-label">Year:</span>
                                    <span>{{ $vinyl->release_year }}</span>
                                </div>
                                <div class="d-flex">
                                    <span class="vinyl-card-label">Genres:</span>
                                    <span>
                                        @if ($vinyl->genres->count() > 0)
                                            {{ $vinyl->genres->pluck('name')->join(', ') }}
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
