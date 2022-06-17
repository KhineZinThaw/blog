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
                <h3>Post Create</h3>
                <div class="card p-3 my-3 bg-light">
                    <form action="/posts" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Title</b></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Body</b></label>
                            <textarea name="body" class="form-control" rows="3" placeholder="Enter Body">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <input type="submit" value="Create" class="btn btn-primary">
                                <input type="reset" value="Reset" class="btn btn-secondary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>