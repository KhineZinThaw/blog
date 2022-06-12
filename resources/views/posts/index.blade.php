<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
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
                                <td>
                                    <a href="/posts/show/{{ $post->id }}" class="btn btn-info">Detail</a>
                                    <a href="/posts/edit/{{ $post->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/posts/delete/{{ $post->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>