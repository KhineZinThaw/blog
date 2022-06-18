@extends('layouts.master')

@section('title')
 Category Create
@endsection

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <a href="/categories" class="btn btn-secondary float-end">Back</a>
            <h3>Category Create</h3>
            <div class="card p-3 my-3 bg-light">
                <form action="/categories" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Category Name</b></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <input type="submit" value="Create" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-secondary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection