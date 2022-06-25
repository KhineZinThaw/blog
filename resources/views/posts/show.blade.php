@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <a href="/posts" class="btn btn-secondary float-end">Back</a>
            <h3>Post Detail</h3>
            <div class="card">
                <div class="card-body">
                    <h3>{{ $post->title }}</h3>
                    <p>Post by {{ $post->author_name }} on June 18, 2022</p>
                    <p>{{ $post->body }}</p>
                    
                    <a href="/posts" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection