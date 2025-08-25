@extends('layouts.app')

@section('title')
    {{ Auth::user()->name }} | Dashboard
@endsection

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary mt-4">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
