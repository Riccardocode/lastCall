<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        return view('homePage.home');
    }
    
    public function choosing()
    {
        return view('homePage.choosing', [
            "businesses" => Business::latest()->paginate(5),
            "products" => Product::latest()->paginate(5),
        ]); 
    }
     
}
