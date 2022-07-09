@extends('layouts.master')

@section('title', $category->name)
@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary float-end">Back</a>
            <h3>Category Detail</h3>
            <div class="card p-3 my-3 bg-light">
                <div class="flex mb-3">
                    <span><b>Name:</b></span>
                    <span>{{ $category->name }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection