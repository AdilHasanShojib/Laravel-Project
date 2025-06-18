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

            <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print</th>
                </tr>
              @foreach($orders as $products)
                <tr>
                    <td>{{$products->name}}</td>
                    <td>{{$products->address}}</td>
                    <td>{{$products->phone}}</td>
                    <td>{{$products->product->title}}</td>
                    <td>{{$products->product->price}}</td>
                    <td>
                        <img height="100" width="70" src="products/{{$products->product->image}}" alt="No Image Found" >
                    </td>

                     <td>

                        @if($products->status == 'On the Way')
                        <span class="text-warning">On the Way</span>
                        @elseif($products->status == 'Delivered')
                        <span class="text-success">Delivered</span>
                        @else
                        <span class="text-danger">In Progress</span>
                        @endif
                    </td>

                     <td>
                        <a href="{{url('on_way',$products->id)}}">On the Way</a>
                        <a  href="{{url('delivered',$products->id)}}">Delivered</a>
                     </td>

                     <td>
                        <a class="btn btn-secondary" href="{{url('print_pdf',$products->id)}}" target="_blank">PDF</a>
                     </td>

                  
   
                  

                </tr>
              @endforeach
            </table>
            
           </div>
          
           
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