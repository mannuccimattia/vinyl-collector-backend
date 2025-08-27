@extends('layouts.app')

@section('title')
    Index | Labels
@endsection

@section('content')
    <div class="container narrow">
        <div class="row my-4 text-light gap-3 align-items-center">
            <div class="col-5">
                <h2>Labels</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vinyls.create') }}">Add new label</a>
            </div>
            @foreach ($labels as $label)
                <div class="col-12">
                    <div class="card dark flex-row align-items-center justify-content-between">
                        <div class="p-2">
                            {{ $label->id . ' - ' . $label->name }}
                        </div>

                        <div class="labels-wrapper pe-1">
                            <a href="" class="btn btn-sm btn-outline-warning">Edit</a>
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
@endsection
