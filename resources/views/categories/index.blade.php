@extends('layouts.master')

@section('title')
 Category List
@endsection

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-8">
            <h3>Category List</h3>
            <a href="/categories/create" class="btn btn-primary float-end">Create Category</a>
            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td style="width: 300px">
                            <form action="/categories/{{ $category->id }}" method="POST" onsubmit="return confirm('Are you sure want to delete?')">
                                @csrf
                                @method('DELETE')
                                
                                <a href="/categories/{{ $category->id }}" class="btn btn-info">Detail</a>
                                <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning">Edit</a>
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