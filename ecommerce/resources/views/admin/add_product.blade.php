<!DOCTYPE html>
<html>
  <head> 
  

    @include('admin.css')
    <style>
        .form{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1{
            color: white;
            text-align: center;
        }

        label{
            display: inline-block;
            width: 250px;
            font-size: 18px !important;
            color: white !important;
        }

        input[type='text']{
            width: 350px;
            height: 50px;
        }

        textarea{
            width: 450px;
            height: 80px;
        }

        .inp{
            padding: 15px;
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
            <h1>Add Product</h1>
            <div id="message" style="text-align:center; color:white; margin-top:10px;"></div>
          <div class="form">
            <form id="productForm" action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
             

               <div class="inp">
                <label>Product Title</label>
                <input type="text" name="title" required>
               </div>

               <div class="inp">
                <label>Description</label>
                <textarea type="text" name="desc" required> </textarea>
               </div>

               <div class="inp">
                <label>Price</label>
                <input type="text" name="price" required>
               </div>

               <div class="inp">
                <label>Quantity</label>
                <input type="number" name="qty" required>
               </div>
               
               <div class="inp">
                <label>Product Category</label>
                <select name="category" required>
                    <option >Select a Option</option>
                    @foreach ($category as $item)
                    <option value="{{$item->category_name}}" >{{$item->category_name}}</option>
                    @endforeach
                        
                    
                </select>
               </div>

               <div class="inp">
                <label>Product Image</label>
                <input type="file" name="image" required>
               </div>

               <div class="inp text-center">
                
                <input type="submit" class="btn btn-success" value="+Add" required>
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
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
      <!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});

$(document).ready(function(){

    $('#productForm').submit(function(e){
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);

        $.ajax({
            url: "{{url('upload_product')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                toastr.success('Product added successfully!', 'Success', {closeButton: true, progressBar: true});
                $('#productForm')[0].reset();
            },
            error: function(xhr){
                toastr.error('Something went wrong!', 'Error', {closeButton: true, progressBar: true});
            }
        });
    });

});
</script>


  </body>
</html>