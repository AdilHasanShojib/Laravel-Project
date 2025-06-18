<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){

        return view('admin.index');
    }

    public function home(){
        $product=Product::all();
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


}
