@extends('layouts.app')

@section('title')
    Index | Labels
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

        <div class="row my-4 text-light row-gap-3 align-items-center">
            <div class="col-6">
                <h2>Labels</h2>
            </div>

            @can('admin')
                <div class="col-6 text-end">
                    <a href="{{ route('labels.create') }}">Add new label</a>
                </div>
            @endcan

            @foreach ($labels as $label)
                <div class="col-12">
                    <div class="card dark flex-row align-items-center justify-content-between">
                        <div class="p-2">
                            {{ $label->name }}
                        </div>

                        @can('admin')
                            <div class="labels-wrapper pe-1">
                                <a href="{{ route('labels.edit', $label) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    Delete
                                </button>
                            </div>

                            <x-delete-modal action="{{ route('labels.destroy', $label) }}" />
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
