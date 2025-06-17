<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\cart;
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



}
