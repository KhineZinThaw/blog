@extends('layouts.master')

@section('title', 'Change Password')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <h3>Change Password</h3>
            <div class="card p-3 my-3 bg-light">
                <form action="{{ route('change-password.update') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label"><b>Old Password</b></label>
                        <input type="password" name="old_password" class="form-control">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><b>New Password</b></label>
                        <input type="password" name="new_password"  class="form-control">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Confirm Password</b></label>
                        <input type="password" name="confirm_password"  class="form-control">
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <input type="submit" value="Change" class="btn btn-primary">
                            <a href="{{ route('profile.show') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection