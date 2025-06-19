<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
    .div_deg {
        padding: 50px;
        background-color: #f8f9fa;
        display: flex;
        justify-content: space-between;
        



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

    label{
        display: inline-block;
        width: 150px;
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

       <div class="div_deg">
        <div class="col-md-4">
            <form action="{{url('order')}}" method="POST">
                @csrf
                <div>
                    <label>Receiver Name</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}"> <br>
               
                    <label>Receiver Address</label>
                    <textarea name="address" class="form-control">{{Auth::user()->address}}</textarea> <br> 
                
                    <label>Receiver Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}" > <br> <br>
                

                
                    <input type="submit" value="Cash on Delivery" class="btn btn-success">
                    <a class="btn btn-primary" href="{{url('stripe')}}">Pay Using Card</a>
                </div>
            </form>
        </div>
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

                <?php
                $value = 0;

                ?>
                @foreach($cart as $item)
                <tr>
                <td>{{ $item->product->title }}</td>
              
                <td>{{ $item->product->price }}</td>
                <td> <img width="100" height="50" src="/products/{{ $item->product->image }}" alt="No Image Found"></td>
                <td><a href="{{ url('remove_cart', $item->id) }}" class="btn btn-danger">Remove</a></td>
                </tr>

                <?php
                $value += $item->product->price;
                ?>
                @endforeach
            </tbody>
            </table>

            <div>
            <h4 class="text-center">Total Value of Cart is: {{ $value }} Taka</h4>
            
         </div>
    
            
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