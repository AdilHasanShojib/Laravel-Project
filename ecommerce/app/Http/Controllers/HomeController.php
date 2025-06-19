<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
class HomeController extends Controller
{
    function index(){

        $user=User::where('usertype', 'user')->get()->count();
        
        $product=Product::all()->count();
        $order=order::all()->count();
        $deliver=order::where('status', 'Delivered')->count();

        return view('admin.index',compact('user', 'product', 'order', 'deliver'));
    }

    public function home(){
        $product = Product::latest()->take(4)->get();

        if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;
        $count=cart::where('user_id',$user_id)->count();
        
        }
        else{
            $count=0;
            
        }
        
        return view('home.index',compact('product', 'count'));
    }

   function details_product($id){
     $data=Product::find($id);

     if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;
        $count=cart::where('user_id',$user_id)->count();
        
        }
        else{
            $count=0;
            
        }

     

     

      return view('home.details_product',compact('data', 'count'));

   }


   function add_cart($id){

    $product_id=$id;
    $user=Auth::user();
    $user_id=$user->id;
    $cart=new cart;
    $cart->user_id=$user_id;
    $cart->product_id=$product_id;
    $cart->save();
    toastr()->closeButton()->addSuccess('Product Added Successfully!');
    return redirect()->back();


   }


   function mycart(){

    if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;
        $count=cart::where('user_id',$user_id)->count();
        $cart=cart::where('user_id',$user_id)->get();
        
        }

    return view('home.mycart',compact('count','cart'));
   }

   function remove_cart($id){

    $cart=cart::find($id);
    $cart->delete();
    toastr()->closeButton()->addSuccess('Product Removed Successfully!');
    return redirect()->back();

   }

   function order(Request $request){

    $user=Auth::user();
    $user_id=$user->id;
    $name=$user->name;
    $phone=$request->phone;
    $address=$request->address;

    $cart=cart::where('user_id',$user_id)->get();

    foreach($cart as $carts){

        $order=new order;
        $order->name=$name;
        $order->phone=$phone;
        $order->address=$address;
        $order->user_id=$user_id;
        $order->product_id= $carts->product_id;
        $order->status='in Progress';
        $order->save();

    }

    $cart_remove=cart::where('user_id',$user_id)->get();
    foreach($cart_remove as $remove){
        $remove->delete();
    }

    toastr()->closeButton()->addSuccess('Order Placed Successfully!');
    return redirect()->back();

   }


   function myorders(){
    $user=Auth::user();
    $user_id=$user->id;
    $count=cart::where('user_id',$user_id)->count();
    $orders=order::where('user_id',$user_id)->get();
    return view('home.myorders',compact('count', 'orders'));
   }


   public function stripe()
    {
        return view('home.stripe');
    }
 

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from Complete" 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function shops(){
        $product=Product::paginate(8);
        if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;
        $count=cart::where('user_id',$user_id)->count();
        
        }
        else{
            $count=0;
            
        }
        
        return view('home.products',compact('product', 'count'));
    }


     public function why(){
        $product=Product::all();
        if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;
        $count=cart::where('user_id',$user_id)->count();
        
        }
        else{
            $count=0;
            
        }
        
        return view('home.why',compact('product', 'count'));
    }

     public function testimonial(){
        $product=Product::all();
        if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;
        $count=cart::where('user_id',$user_id)->count();
        
        }
        else{
            $count=0;
            
        }
        
        return view('home.testimonial',compact('product', 'count'));
    }


     public function contacts(){
        $product=Product::all();
        if(Auth::id()){

        $user=Auth::user();
        $user_id=$user->id;
        $count=cart::where('user_id',$user_id)->count();
        
        }
        else{
            $count=0;
            
        }
        
        return view('home.contacts',compact('product', 'count'));
    }



}
