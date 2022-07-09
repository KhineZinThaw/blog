@extends('layouts.master')

@section('title', 'Category List')

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
            <h3>Category List</h3>
            <a href="{{ route('categories.create') }}" class="btn btn-primary float-end">Create Category</a>
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
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete?')">
                                @csrf
                                @method('DELETE')
                                
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection