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

    <div class="container">
      <div class="div_deg">
        
            
        <table class="table table-bordered">
          <thead>
            <tr>
              
              <th>Product Name</th>
              
              <th>Total Price</th>
              <th>Imsge</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              
              <td>{{ $order->product->title }}</td>
              
              <td>{{ $order->product->price }}</td>
              <td> <img width="100" height="50" src="/products/{{ $order->product->image }}" alt="No Image Found"></td>
              <td>{{ $order->status }}</td>
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