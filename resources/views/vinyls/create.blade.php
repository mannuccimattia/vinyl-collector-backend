@extends('layouts.app')

@section('title')
    Add New | Vinyl
@endsection

@section('content')
    <div class="container narrow">
        <div class="row my-4 text-light gap-3">
            <h2>Add a new vinyl</h2>

            <form action="{{ route('vinyls.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="input-group mb-3">
                    <label for="title" class="input-group-text dark">Title</label>
                    <input type="text" class="form-control dark" name="title" id="title" required>
                </div>

                <div class="input-group mb-3">
                    <label for="artist" class="input-group-text dark">Artist</label>
                    <input type="text" class="form-control dark" name="artist" id="artist" required>
                </div>

                <div class="input-group mb-3">
                    <label for="cover" class="input-group-text dark">Cover</label>
                    <input type="file" data-bs-theme="dark" class="form-control dark" name="cover" id="cover">
                </div>

                <div class="input-group mb-3">
                    <label for="country" class="input-group-text dark">Country</label>
                    <input type="text" class="form-control dark" name="country" id="country" required>
                </div>

                <div class="input-group mb-3">
                    <label for="label_id" class="input-group-text dark">Label</label>
                    <select name="label_id" id="label_id" class="form-select dark" aria-label="select label for vinyl"
                        required>
                        <option value="0" selected disabled>Select a label...</option>
                        @foreach ($labels as $label)
                            <option value="{{ $label->id }}">{{ $label->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text dark" for="genres_id">Genres</label>
                    <div class="form-control dark d-flex flex-wrap row-cols-3">
                        @foreach ($genres as $genre)
                            <div class="col">
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}" id="{{ $genre->id }}">
                                <small>
                                    <label for="{{ $genre->id }}">{{ $genre->name }}</label>
                                </small>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="input-group mb-3">
                    <label for="release_year" class="input-group-text dark">Year</label>
                    <input type="number" class="form-control dark" name="release_year" id="release_year"
                        min="1901 required" max="2155" required>
                </div>

                <div class="input-group mb-3">
                    <label for="catalog_number" class="input-group-text dark">Catalog</label>
                    <input type="text" class="form-control dark" name="catalog_number" id="catalog_number" required>
                </div>

                <div class="d-flex gap-2">
                    <input class="btn btn-outline-primary" type="submit" value="Save">
                    <a href="{{ route('vinyls.index') }}" class="btn btn-outline-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
