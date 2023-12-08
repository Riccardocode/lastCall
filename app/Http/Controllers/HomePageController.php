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

    public function sellPath()
    {
        if (auth()->user() && auth()->user()->role == 'admin') {
            return redirect('/business');
        }
        if (auth()->user() && auth()->user()->role == 'restaurantManager') {
            $business = Business::where('manager_id', auth()->user()->id)->first();
            return redirect('/business/' . $business->id . "/products");
        }
        if (auth()->user() && auth()->user()->role == 'user') {
            return view('users.becomeManager',[
                'user_id'=>auth()->user()->id,
                'registerAsManager'=>true,
            ]);       
        }
        return (view('homePage.sellPath'));
        
    }
     
}
