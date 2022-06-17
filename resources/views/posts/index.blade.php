<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    @include('components._nav')
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
    </body>
    </html>