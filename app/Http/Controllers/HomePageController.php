<?php

namespace App\Http\Controllers;

use App\Domain\Choosing\ChoosingLogic;
use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Domain\Map\CustomRouting;
// use Illuminate\Support\Facades\Request;

class HomePageController extends Controller
{
    public function home()
    {
        return view('homePage.home');
    }
    
    public function choosing(Request $request)
    {
        $page = $request->get('page', 1); // Get current page from request, default is 1
        $perPage = 5; // Set how many items you want per page
        return view('homePage.choosing', [
            "businesses" => ChoosingLogic::orderBusinessesbyProximity($perPage,$page),
            "products" => Product::latest()->paginate(5),
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
