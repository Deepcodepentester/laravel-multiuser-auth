<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('myauth:vendor');
    }
    
    public function index(Type $var = null)
    {
        # code...
        return view("vendor.index");
    }
}
