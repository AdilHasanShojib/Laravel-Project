<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\order;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $product= Product::paginate(5);
        return view('admin.view_product',compact('product'));
    }

    function delete_product($id){
        $data= Product::find($id);
        $img_path=public_path('products/'.$data->image);
        if(file_exists($img_path)){
            unlink($img_path);
        }
        $data->delete();
        toastr()->closeButton()->addWarning('Delete Item Successfully!');
        return redirect()->back();

    }


    function edit_product($id){

        $data= Product::find($id);
        $category= Category::all();
        return view('admin.edit_product',compact('data','category'));

    }

    function update_product(Request $req,$id){

        $data= Product::find($id);
        $data->title=$req->title;
        $data->description=$req->description;
        $data->category=$req->category;
        $data->price=$req->price;
        $data->quantity=$req->quantity;
        $img=$req->image;
        if($img){
            $imgName=time().'.'.$img->getClientOriginalExtension();
            $req->image->move('products',$imgName);
            $data->image=$imgName;
        }
        $data->save();
        toastr()->closeButton()->addSuccess('Category Update Successfully!');
        return redirect('/view_product');
       

    }

    function search_product(Request $req){

        if ($req->has('search') && !empty($req->search)) {
           $search = $req->search;
           $product = Product::where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('category', 'LIKE', '%'.$search.'%')
                ->paginate(2);

            } 
            
            else {
              $product = Product::paginate(2); // show all if no search
          }

          return view('admin.view_product',compact('product'));



    }

     function view_orders(){
        $orders = order::all();
        return view('admin.orders', compact('orders'));
     }

     function on_way($id){
        $data= order::find($id);
        $data->status='On the Way';
        $data->save();
        toastr()->closeButton()->addSuccess('Order Status Updated Successfully!');
        return redirect()->back();
     }

     function delivered($id){
        $data= order::find($id);
        $data->status='Delivered';
        $data->save();
        toastr()->closeButton()->addSuccess('Order Delivered Successfully!');
        return redirect()->back();
     }

     function print_pdf($id){
        $data = order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
     }
}
