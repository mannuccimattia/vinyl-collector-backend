@extends('layouts.app')

@section('title')
    Index | Vinyls
@endsection

@section('content')
    <div class="container">
        <div class="row my-4 text-light row-gap-3 align-items-center">
            <div class="col-6">
                <h2 class="my-0">My collection</h2>
            </div>
            @can('admin')
                <div class="col-6 text-end">
                    <a href="{{ route('vinyls.create') }}" class="btn btn-sm btn-outline-primary">Add new vinyl</a>
                </div>
            @endcan

            {{ $vinyls->links() }}
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
            {{ $vinyls->links() }}
        </div>
    </div>
@endsection
