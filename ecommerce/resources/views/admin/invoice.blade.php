<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        
        <h3>Customer name:{{$data->name}}</h3>
        <h3>Customer address:{{$data->address}}</h3>
        <h3>Customer phone:{{$data->phone}}</h3>
        <img src="products/{{$data->product->image}}" alt="No Image Found" style="height: 200px; width: 200px;">
        <h2>Product Title:{{$data->product->title}}</h2>
        <h2>Product Price:{{$data->product->price}}</h2>
        
    </center>
</body>
</html>