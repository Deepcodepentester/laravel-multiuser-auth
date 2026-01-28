<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('myauth:admin');
    }
    
    public function index(Type $var = null)
    {
        # code...
        return view("admin.index");
    }
}
