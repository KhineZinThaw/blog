@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <a href="/posts" class="btn btn-secondary float-end">Back</a>
            <h3>Post Detail</h3>
            <div class="card">
                <div class="card-body">
                    <img src="{{ $post->image }}" class="card-img-top" alt="Post Image" height="200" class="figure-img img-fluid rounded">
                    <h3>{{ $post->title }}</h3>
                    <p>Post by {{ $post->user->name }} on {{ $post->created_at->diffForHumans() }}</p>
                    <p>{{ $post->body }}</p>
                    
                    <a href="/posts" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection