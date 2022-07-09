@extends('layouts.master')

@section('title', 'Post List')

@section('content')
    <div class="row justify-content-center py-5">
        @include('components._alert')
        <div class="col-8">
            <div class="d-flex justify-content-end">
                <form>
                    <div class="input-group">
                        <input type="search" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search...">
                        <button class="btn btn-primary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            @foreach ($posts as $post)
            <div>
                <h3>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h3>
                <i>{{ $post->created_at->diffForHumans() }}</i> by {{ $post->user->name }}
                <p>{{ $post->body }}</p>
                @foreach ($post->categories() as $category)
                    <b>{{ $category->name }} | </b>
                @endforeach
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