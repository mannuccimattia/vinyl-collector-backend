@extends('layouts.app')

@section('title')
    Index | Genres
@endsection

@section('content')
    <div class="container narrow">

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                {!! session('error') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row my-4 text-light gap-3 align-items-center">
            <div class="col-5">
                <h2>Genres</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('genres.create') }}">Add new genre</a>
            </div>
            @foreach ($genres as $genre)
                <div class="col-12">
                    <div class="card dark flex-row align-items-center justify-content-between">
                        <div class="p-2">
                            {{ $genre->name }}
                        </div>

                        <div class="labels-wrapper pe-1">
                            <a href="{{ route('genres.edit', $genre) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-delete-modal action="{{ route('genres.destroy', $genre) }}" />
@endsection
