<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
    .div_deg {
        padding: 50px;
        background-color: #f8f9fa;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .text-center {
        text-align: center;
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

       <div class="div_deg">
        <div class="container">
            <h1 class="text-center">My Cart</h1>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>Product Name</th>
                
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                <td>{{ $item->product->title }}</td>
              
                <td>{{ $item->product->price }}</td>
                <td> <img width="100" height="50" src="/products/{{ $item->product->image }}" alt="No Image Found"></td>
                <td><a href="{{ url('remove_cart', $item->id) }}" class="btn btn-danger">Remove</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
    
            
         </div>
    


       </div>
        










   

   

  <!-- info section -->
 @include('home.info')
  
    <!-- footer section -->
@include('home.footer')
    <!-- end footer section -->

  

  <!-- end info section -->


</body>

</html>