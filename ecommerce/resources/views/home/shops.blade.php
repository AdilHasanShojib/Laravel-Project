<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>

        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
            
        
        }

    </style>
</head>
<body>
     <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          All Products
        </h2>
      </div>
      <div class="row">
        @foreach($product as $products)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="No Image Found">
              </div>
              <div class="detail-box">
                <h6>
                  {{$products->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    {{$products->price}}
                  </span>
                </h6>
              </div>
             

              <div style="padding:10px">
                <a class="btn btn-warning" href="{{url('details_product',$products->id)}}">Details</a>
                <a class="btn btn-primary" href="{{url('add_cart',$products->id)}}">+Add to Cart</a>
              </div>

              
              
            
          </div>
        </div>

        @endforeach

       
        
      </div>

       <div class="div_deg">
             {{$product->onEachSide(4)->links()}}
           </div>
      
    </div>
  </section>
    
</body>
</html>
 