<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <form method="POST">

        @csrf

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
        </div>

        <div class="form-group">
            <label for="">Count</label>
            <input type="text" class="form-control" name="count" value="{{$product->count}}">
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
        </div>

        <div>
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>

</div>

</body>
</html>
