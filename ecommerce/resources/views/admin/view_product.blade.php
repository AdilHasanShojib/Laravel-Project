<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        
        }

        .table_deg{
            border: 2px solid greenyellow;
        }

        th{
            background-color:skyblue;
            color:white;
            font-size:19px;
            font-weight: bold;
            padding:15px;
        }

        td{
            border: 1px solid skyblue !important;
            text-align:center;
            color:white;


        }

        input[type="search"]{

          width: 400px;
          height: 40px;
          margin-left: 100px;
        }
    </style>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>
  <body>
   <header class="header">
    @include('admin.header')
   </header>
    
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{url('search_product')}}" method="get">
              @csrf
              <input type="search" name="search">
              <input type="submit"  class="btn btn-primary" Value="Search">
            </form>


           <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                    
                </tr>
              @foreach($product as $products)
                <tr>
                    <td>{{$products->title}}</td>
                    <td>{!!Str::limit($products->description,50)!!}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>
                        <img height="120" width="120" src="products/{{$products->image}}" alt="No Image Found" >
                    </td>

                     <td>
                        <a class="btn btn-secondary" href="{{url('edit_product',$products->id)}}">Edit</a>
                    </td>

                    <td>
                        <a class="btn btn-danger" href="{{url('delete_product',$products->id)}}" onclick="confirmation(event)">Delete</a>
                    </td>
                   

                </tr>
              @endforeach
            </table>
            
           </div>
           <div class="div_deg">
             {{$product->onEachSide(1)->links()}}
           </div>
           
          </div>
        </div>
      </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
     <script type="text/javascript">
     function confirmation(e){
      e.preventDefault();

      var urlToRedirect=e.currentTarget.getAttribute('href');

      swal({

        title:"Are you want to Delete This",
        text:"This Delete Will be Permanent",
        icon:"warning",
        buttons: true,
        dangerMode: true,


      })
      .then((willCancel)=>{

        if(willCancel){
          window.location.href=urlToRedirect;
        }

      })

     }

    </script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>