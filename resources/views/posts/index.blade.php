@extends('layouts.master')

@section('title', 'Post List')

@section('content')
    <div class="row justify-content-center py-5">
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
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td style="width: 300px">
                            <form action="/posts/{{ $post->id }}" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                @csrf
                                @method('DELETE')
                                
                                <a href="/posts/{{ $post->id }}" class="btn btn-info">Detail</a>
                                <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection