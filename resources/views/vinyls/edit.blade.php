@extends('layouts.app')

@section('title')
    Edit | Vinyl
@endsection

@section('content')
    <div class="container narrow">
        <div class="row mt-3 mb-2 text-light gap-3">
            <h2>Edit existing vinyl</h2>

            <form action="{{ route('vinyls.update', $vinyl) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="input-group mb-3">
                    <label for="artist" class="input-group-text dark">Artist</label>
                    <input type="text" class="form-control dark" name="artist" id="artist"
                        value="{{ $vinyl->artist }}">
                </div>

                <div class="input-group mb-3">
                    <label for="title" class="input-group-text dark">Title</label>
                    <input type="text" class="form-control dark" name="title" id="title"
                        value="{{ $vinyl->title }}">
                </div>

                <div class="input-group mb-3 d-flex">
                    <label for="cover" class="input-group-text dark">Cover</label>
                    <input type="file" data-bs-theme="dark" class="form-control dark" name="cover" id="cover">
                    @if ($vinyl->cover)
                        <img src="{{ asset('storage/' . $vinyl->cover) }}" alt="cover of the album {{ $vinyl->title }}"
                            class="ms-auto img-tooltip rounded-end">
                    @endif
                </div>

                <div class="input-group mb-3">
                    <label for="country" class="input-group-text dark">Country</label>
                    <input type="text" class="form-control dark" name="country" id="country"
                        value="{{ $vinyl->country }}">
                </div>

                <div class="input-group mb-3">
                    <label for="label_id" class="input-group-text dark">Label</label>
                    <select name="label_id" id="label_id" class="form-select dark" aria-label="select label for vinyl">
                        <option value="0" selected disabled>Select a label...</option>
                        @foreach ($labels as $label)
                            <option value="{{ $label->id }}" {{ $vinyl->label_id == $label->id ? 'selected' : '' }}>
                                {{ $label->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text dark" for="genres_id">Genres</label>
                    <div class="form-control dark d-flex flex-wrap row-cols-3">
                        @foreach ($genres as $genre)
                            <div class="col">
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}" id="{{ $genre->id }}"
                                    {{ $vinyl->genres->contains($genre->id) ? 'checked' : '' }}>
                                <small>
                                    <label for="{{ $genre->id }}">{{ $genre->name }}</label>
                                </small>
                            </div>
                        @endforeach
                    </div>
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

                <div class="input-group mb-4">
                    <label for="release_num" class="input-group-text dark">Release N°</label>
                    <input type="text" class="form-control dark" name="release_num" id="release_num"
                        value="{{ $vinyl->release_num }}">
                </div>

                <div class="input-group mb-3">
                    <label for="release_url" class="input-group-text dark">Release URL</label>
                    <input type="text" class="form-control dark" name="release_url" id="release_url"
                        value="{{ $vinyl->release_url }}">
                </div>

                <div class="d-flex gap-3">
                    <input class="btn btn-outline-primary" type="submit" value="Save">
                    <a href="{{ route('vinyls.show', $vinyl) }}" class="btn btn-outline-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
