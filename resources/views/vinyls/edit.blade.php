@extends('layouts.app')

@section('title')
    Edit | Vinyl
@endsection

@section('content')
    <div class="container narrow">
        <div class="row my-4 text-light gap-3">
            <h2>Edit existing vinyl</h2>

            <form action="{{ route('vinyls.update', $vinyl) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="input-group mb-3">
                    <label for="title" class="input-group-text dark">Title</label>
                    <input type="text" class="form-control dark" name="title" id="title" value="{{ $vinyl->title }}">
                </div>

                <div class="input-group mb-3">
                    <label for="artist" class="input-group-text dark">Artist</label>
                    <input type="text" class="form-control dark" name="artist" id="artist"
                        value="{{ $vinyl->artist }}">
                </div>

                <div class="input-group mb-3">
                    <label for="country" class="input-group-text dark">Country</label>
                    <input type="text" class="form-control dark" name="country" id="country"
                        value="{{ $vinyl->country }}">
                </div>

                <div class="input-group mb-3">
                    <label for="release_year" class="input-group-text dark">Year</label>
                    <input type="number" class="form-control dark" name="release_year" id="release_year" min="1901"
                        max="2155" value="{{ $vinyl->release_year }}">
                </div>

                <div class="input-group mb-4">
                    <label for="catalog_number" class="input-group-text dark">Catalog</label>
                    <input type="text" class="form-control dark" name="catalog_number" id="catalog_number"
                        value="{{ $vinyl->catalog_number }}">
                </div>

                <div class="d-flex gap-3">
                    <input class="btn btn-outline-primary" type="submit" value="Save">
                    <a href="{{ route('vinyls.index') }}" class="btn btn-outline-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
