<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

        input[type='text']{
            width: 400px;
            height: 50px;
        }

        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .table_deg{
          text-align: center;
          margin: auto;
          border: 2px solid yellowgreen;
          margin-top: 50px;
          width: 600px;


        }

        th{
          background-color: skyblue;
          padding: 15px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }

        td{
          color: white;
          padding: 10px;
          border: 1px solid skyblue;
        }

    </style>
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

            <h1 style="color:white; text-align:center;">Edit Category</h1>

          
            <div class="div_deg">
            <form action="{{url('update_category',$data->id)}}" method="post" >
                @csrf
            <div>
                <input type="text" name="category" value="{{$data->category_name}}">
                <input type="submit" class="btn btn-secondary" value="Update">
            </div>
          </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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