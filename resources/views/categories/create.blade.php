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
                <a href="/categories" class="btn btn-secondary float-end">Back</a>
                <h3>Category Create</h3>
                <div class="card p-3 my-3 bg-light">
                    <form action="/categories" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="" class="form-label"><b>Category Name</b></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{ old('name') }}">
                            @error('name')
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
    </div>
</body>
</html>