<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <a class="mr-3" href="/products">Products</a>
    @auth
        <a href="/products/new">Add a Product</a>
    @else
        <p><a href="/login">Sign In</a> To Add</p>
    @endauth
    <table class="table">
        <tr>
            <th>#</th>
            <th>Product's Name</th>
            <th>Count</th>
            <th>Price For One</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @php
        $sum = 0;
        @endphp

        @foreach($carts as $key => $cart)

            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$cart->product->name}}</td>
                <td class="d-flex">
                    {{$cart->count}}
                    <form action="/carts/plus/{{$cart->id}}" method="POST">
                        @csrf
                        <input type="submit" value="+" class="btn btn-primary mr-2 ml-2">
                    </form>
                    <form action="/carts/minus/{{$cart->id}}" method="POST">
                        @csrf
                        <input type="submit" value="-" class="btn btn-danger">
                    </form>
                </td>
                <td>{{$cart->product->price}}</td>
                <td>{{$cart->product->price * $cart->count}}</td>
                @php
                $sum += $cart->product->price * $cart->count;
                @endphp
                <td class="d-flex">
                    <form action="/carts/delete/{{$cart->id}}" method="POST">
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <p><strong>Summary: </strong>{{$sum}}</p>
</div>

</body>
</html>
