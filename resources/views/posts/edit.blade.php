@extends('layouts.master')

@section('title', 'Post Edit')
@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <a href="/posts" class="btn btn-secondary float-end">Back</a>
            <h3>Post Edit</h3>
            <div class="card p-3 my-3 bg-light">
                <form action="/posts/{{ $post->id }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Image</b></label>
                        <input type="file" name="images[]" class="form-control" multiple>
                        @error('images')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @foreach($errors->get('images.*') as $message)
                            <span class="text-danger">{{ $message[0] }}</span>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Title</b></label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $post->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Categories</b></label>
                        <select name="categories[]" class="form-control" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    @if($post->categories()->pluck('id')->contains($category->id)) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><b>Body</b></label>
                        <textarea name="body" class="form-control" rows="3" placeholder="Enter Body">{{ $post->body }}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <input type="submit" value="Update" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-secondary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection