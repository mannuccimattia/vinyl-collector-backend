@extends('layouts.app')

@section('title')
    {{ Auth::user()->name }} | Dashboard
@endsection

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card dark mt-4">
                    <div class="card-header dark">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <div class="d-flex mt-3 gap-3">
                            <p>
                                <a href="{{ url('/vinyls') }}">
                                    {{ __('Vinyls') }}</a>
                            </p>
                            <p>
                                <a href="{{ url('/labels') }}">
                                    {{ __('Labels') }}</a>
                            </p>
                            <p>
                                <a href="{{ url('/genres') }}">
                                    {{ __('Genres') }}</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
