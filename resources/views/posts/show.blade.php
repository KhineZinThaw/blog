@extends('layouts.master')

@section('title')
 {{ $post->title }}
@endsection

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <a href="/posts" class="btn btn-secondary float-end">Back</a>
            <h3>Post Detail</h3>
            <div class="card p-3 my-3 bg-light">
                <div class="flex mb-3">
                    <span><b>Title:</b></span>
                    <span>{{ $post->title }}</span>
                </div>
                <div class="flex mb-3">
                    <span><b>Body:</b></span>
                    <span>{{ $post->body }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection