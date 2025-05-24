<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function view_category(){

        return view('admin.category');
    }


    public function add_category(Request $req){

        $data= new Category();
        $data->category_name=$req->category;
        
        $data->save();
        return redirect()->back();

        
       

    }
}
