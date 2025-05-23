<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){

        return view('admin.index');
    }

    function home(){
        return view('home.index');
    }
}
