<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
