@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="container">
        <div class="card dark mt-2 p-4 mb-4 shadow rounded-lg">

            @include('profile.partials.update-profile-information-form')

        </div>

        <div class="card dark p-4 mb-4 shadow rounded-lg">


            @include('profile.partials.update-password-form')

        </div>

        <div class="card dark p-4 mb-4 shadow rounded-lg">


            @include('profile.partials.delete-user-form')

        </div>
    </div>
@endsection
