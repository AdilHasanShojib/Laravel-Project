<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function view_category(){

        $data= Category::all();

        return view('admin.category',compact('data'));
    }


    public function add_category(Request $req){

        $data= new Category();
        $data->category_name=$req->category;
        
        $data->save();
        toastr()->closeButton()->addSuccess('Category added Successfully!');
        return redirect()->back();

        
    }

    public function  delete_category($id){

        Category::destroy($id);

        // $data= Category::find($id);
        // $data->delete();
        toastr()->closeButton()->addWarning('Delete Item Successfully!');
        return redirect()->back();



    }


    function edit_category($id){

        $data= Category::find($id);
        return view('admin.edit_category',compact('data'));

    }

    function update_category(Request $req,$id){

        $data= Category::find($id);
        $data->category_name=$req->category;
        $data->save();
        toastr()->closeButton()->addSuccess('Category Update Successfully!');
        return redirect('/view_category');
       

    }

    function add_product(){

        $category= Category::all();

        return view('admin.add_product',compact('category'));
    }

    function upload_product(Request $req){

        $data= new Product();
        $data->title=$req->title;
        $data->description=$req->desc;
        $data->price=$req->price;
        $data->quantity=$req->qty;
        $data->category=$req->category;
        $image=$req->image;

        if($image){
            $imgname= time().'.'.$image->getClientOriginalExtension();
            $req->image->move('products',$imgname);
            $data->image=$imgname;
        }
        
        $data->save();
        toastr()->closeButton()->addSuccess('Category added Successfully!');
        return redirect()->back();

    }

    function view_product(){
        $product= Product::all();
        return view('admin.view_product',compact('product'));
    }
}
