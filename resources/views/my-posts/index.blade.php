@extends('layouts.master')

@section('title', 'My Post')

@section('content')
    @foreach ($posts as $post)
        <li>{{ $post->title }}</li>
    @endforeach
@endsection