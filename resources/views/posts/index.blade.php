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
            <h3>Post List</h3>
            <a href="/posts/create" class="btn btn-primary float-end">Create Post</a>
            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }} <br>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->body }}</td>
                        <td style="width: 300px">
                            @auth
                                <form action="/posts/{{ $post->id }}" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="/posts/{{ $post->id }}" class="btn btn-info">Detail</a>
                                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection