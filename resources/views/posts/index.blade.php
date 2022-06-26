@extends('layouts.master')

@section('title', 'Post List')

@section('content')
    <div class="row justify-content-center py-5">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-8">
            @foreach ($posts as $post)
            <div>
                <h3>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h3>
                <i>{{ $post->created_at->diffForHumans() }}</i> by {{ $post->author }}
                <p>{{ $post->body }}</p>
                @if($post->isOwnPost())
                <div class="d-flex justify-content-end">
                    <a href="/posts/{{ $post->id }}/edit/" class="btn btn-outline-success">Edit</a>
                    <form action="/posts/{{ $post->id }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure to delete?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                    </form>
                </div>
                @endif
            </div>
        
            <hr>
        @endforeach
    
        {{ $posts->links() }}
        </div>
    </div>
@endsection