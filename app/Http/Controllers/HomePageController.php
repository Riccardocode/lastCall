<?php

namespace App\Http\Controllers;

use App\Domain\Choosing\ChoosingLogic;
use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Domain\Map\CustomRouting;
use App\Models\Category;
use App\Models\SalesLot;

class HomePageController extends Controller
{
    public function home()
    {
        return view('homePage.home');
    }

    public function aboutUs() 
    {
        return view('aboutUs');
    }
    
    public function choosing()
    {
        
        return view('homePage.choosing', [
            "businesses" => ChoosingLogic::orderBusinessesbyProximity(),
            "saleslots" => ChoosingLogic::orderSaleslotsByProximity(),
            "categories" => Category::all()
        ]); 
    }

    public function getBy2kmRadius(Request $request){
        $address = $request->validate([
            "address" => "required"
        ]);
        $businesses = CustomRouting::filterByAddress($address["address"],Business::all());
        CustomRouting::walkingTime($businesses);
        
        return redirect("/choosing");

        // {{-- @dd($businesses->first(function($business) use($key) {return $business->id == $key;})); --}}
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
