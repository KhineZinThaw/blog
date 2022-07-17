@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <h3>Profile Edit</h3>
            <div class="card p-3 my-3 bg-light">
                <form action="{{ route('profile.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <img src="{{ auth()->user()->photo() }}" alt="" width="100">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label"><b>Image</b></label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Name</b></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Email</b></label>
                        <input type="email" name="email"  class="form-control" value="{{ old('email', Auth::user()->email) }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <input type="submit" value="Update" class="btn btn-primary">
                            <a href="{{ route('profile.show') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection