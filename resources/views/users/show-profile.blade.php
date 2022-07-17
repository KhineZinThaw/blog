@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    <div class="row justify-content-center py-5">
        @include('components._alert')
        <div class="col-8">
            <h3>Profile</h3>
            <div class="card p-3 my-3 bg-light">
                <img src="{{ auth()->user()->photo() }}" alt="" width="100">
                <div class="mb-3">
                    <label for="" class="form-label"><b>Name</b></label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"><b>Email</b></label>
                    <input type="email" name="email"  class="form-control" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <a href="{{ route('profile') }}" class="btn btn-outline-primary me-3">Profile Update</a>
                        <a href="{{ route('change-password.edit') }}" class="btn btn-outline-primary">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection