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
                <a href="/posts" class="btn btn-secondary float-end">Back</a>
                <h3>Post Detail</h3>
                <div class="card p-3 my-3 bg-light">
                    <div class="flex mb-3">
                        <span><b>Title:</b></span>
                        <span>{{ $post->title }}</span>
                    </div>
                    <div class="flex mb-3">
                        <span><b>Body:</b></span>
                        <span>{{ $post->body }}</span>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>