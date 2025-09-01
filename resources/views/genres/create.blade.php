@extends('layouts.app')

@section('title')
    Add new | Genre
@endsection

@section('content')
    <div class="container narrow">
        <div class="row mt-4 text-light gap-3">
            <h2>Add a new genre</h2>

            <form action="{{ route('genres.store') }}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <label for="name" class="input-group-text dark">Name</label>
                    <input type="text" class="form-control dark" name="name" id="name" required>
                </div>

                <div class="d-flex gap-2">
                    <input class="btn btn-outline-primary" type="submit" value="Save">
                    <a href="{{ route('genres.index') }}" class="btn btn-outline-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
