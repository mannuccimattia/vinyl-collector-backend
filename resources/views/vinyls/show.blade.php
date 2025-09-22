@extends('layouts.app')

@section('title')
    {{ $vinyl->title }} - {{ $vinyl->release_year }}
@endsection

@section('content')
    <div class="container">
        <div class="row mt-5 pt-5 no-margin-sm mb-3 text-light">
            <div class="col-12 col-lg-4">
                <img class="img-fluid mb-2"
                    src="{{ $vinyl->cover ? asset('storage/' . $vinyl->cover) : Vite::asset('resources/img/logo/vinylcollector-black-disc.png') }}"
                    alt="cover of the album {{ $vinyl->title }}">
            </div>
            <div class="col-12 col-lg-8 ps-3">
                <h4 class="mb-4">{{ $vinyl->artist }} - {{ $vinyl->title }}</h4>

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
                <div class="d-flex">
                    <span class="vinyl-card-label">Label:</span>
                    <span>{{ $vinyl->label->name }}</span>
                </div>

                <div class="mt-4 d-flex">
                    <span class="vinyl-card-label">Country:</span>
                    <span>{{ $vinyl->country }}</span>
                </div>
                <div class="d-flex">
                    <span class="vinyl-card-label">Catalog:</span>
                    <span>{{ $vinyl->catalog_number }}</span>
                </div>
                <div class="d-flex">
                    <span class="vinyl-card-label">Release:</span>
                    <span><a href="{{ $vinyl->release_url }}" target="_blank"
                            class="text-decoration-none">[{{ $vinyl->release_num }}]</a></span>
                </div>

                @can('admin')
                    <div class="d-flex mt-4 gap-3">
                        <a href="{{ route('vinyls.edit', $vinyl) }}" class="btn btn-outline-warning">Edit</a>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $vinyl->id }}">
                            Delete
                        </button>
                    </div>
                @endcan

                <div class="mt-5 return-btn">
                    <a href="{{ route('vinyls.index') }}" class="btn btn-outline-primary w-100 text-decoration-none">Go
                        back ↺</a>
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal :id="$vinyl->id" action="{{ route('vinyls.destroy', $vinyl) }}" />
@endsection
