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
                    <span class="vinyl-card-label">Label:</span>{{ $vinyl->label->name }}
                </div>

                <div class="mt-5">
                    <span class="vinyl-card-label">Country:</span>{{ $vinyl->country }}
                </div>
                <div>
                    <span class="vinyl-card-label">Catalog #:</span>{{ $vinyl->catalog_number }}
                </div>

                <div class="d-flex mt-5 gap-3">
                    <a href="{{ route('vinyls.edit', $vinyl) }}" class="btn btn-outline-warning">Edit</a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        Delete
                    </button>
                </div>

                <div class="mt-5">
                    <a href="{{ route('vinyls.index') }}">Go back ↺</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true"
        data-bs-theme="dark">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header">
                    <h1 class="modal-title text-danger fs-5 fw-semibold" id="deleteModalLabel">Unreversible changes ahead!
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to <strong>permanently delete</strong> this vinyl?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Undo</button>
                    <form action="{{ route('vinyls.destroy', $vinyl) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
