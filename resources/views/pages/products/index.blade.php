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
    <div class="container">
        @auth
            <a href="/products/new">Add a Product</a>
        @else
            <p><a href="/login">Sign In</a> To Add</p>
        @endauth
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Count</th>
                <th>Price</th>
                <th>User's Name</th>
                <th>Action</th>
            </tr>


            @foreach($products as $key => $product)

                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->count}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->user->name}}</td>
                    @if($current_id == $product->user->id)
                    <td class="d-flex">
                        <a href="/products/edit/{{$product->id}}" class="btn btn-warning mr-2">Edit</a>

                        <form action="/products/delete/{{$product->id}}" method="POST">
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    @else
                        <td>
                            <form action="/products/toCart/{{$product->id}}" method="POST">
                                @csrf
                                <input type="submit" value="Add to Cart" class="btn btn-success">
                            </form>
                        </td>

                    @endif
                </tr>
            @endforeach
        </table>
    </div>

</body>
</html>
