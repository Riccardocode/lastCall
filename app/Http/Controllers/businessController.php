<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Domain\Map\CustomMap;


class BusinessController extends Controller
{
    //Show all Businesses
    //Only admin can see all businesses
    public function index()
    {
        if (!auth()->check() || !(auth()->user()->role == 'admin')) {
            abort(403, 'Unauthorized action.');
        }
        $businesses = Business::with(['manager', 'category'])->get();

        return view('business.index', [
            'business' => $businesses,
        ]);
    }

    //Show specific Business
    //Admin can see business with any ID
    //Manager can see only business with his ID
    public function show($id)
    {
        if (!auth()->check() || auth()->user()->id !== Business::find($id)->manager_id && !(auth()->user()->role == 'admin')) {
            abort(403, 'Unauthorized action.');
        }
        return view("business.show", [
            "business" => Business::with(['manager', 'category'])->find($id),
            'business_id'=>$id,
           
        ]);
    }

    //Todo: make the admin to execute CRUD. this requires to make sure 
    //the Admin Id is not used as manager_id for the business

    //show form to create business
    //only manager can create business
    public function create()
    {
        if (!auth() ->check() || auth()->user()->role !== 'restaurantManager' and !(auth()->user()->role == 'admin')) {
            abort(403, 'Unauthorized action.');
        }
        //if the user is a manager and already has a business, redirect to the business page
        if (auth()->user()->role=='restaurantManager'){
            $business=Business::where('manager_id',auth()->user()->id)->first();
            if($business){
                return redirect('/business/'.$business->id);
            }
        }
        return view(
            "business.create",
            [
                'manager_id' => auth()->user()->id,
                'categories' => Category::all(),
            ]
        );
    }

    //add business to database
    //only manager can create business
    public function store(Request $request)
    {
        if (!auth() ->check() || auth()->user()->role !== 'restaurantManager' and !(auth()->user()->role == 'admin')) {
            abort(403, 'Unauthorized action.');
        }
        $formFields = $request->validate([
            "name" => "required",
            "address" => "required",
            "category_id" => "required",

        ]);
        if($request->hasFile('businessImg'))
        {
            $formFields['businessImg'] = $request->file('businessImg')->store('businessImages', 'public');
        }

        $response = CustomMap::addressToCoords($formFields["address"]);
        $formFields["lat"]=$response[0]["lat"];
        $formFields["lon"]=$response[0]["lon"];
        $formFields["manager_id"] = auth()->user()->id;
        Business::create($formFields);
        $business=Business::where('manager_id',auth()->user()->id)->first();
        return redirect("/business/".$business->id);
    }

    //show edit Form
    //only manager can edit business
    public function edit($id)
    {
        $business = Business::find($id);

        if ($business->manager_id != auth()->user()->id and !(auth()->user()->role == 'admin')) {
            abort(403, "Unauthorized action");
        }

        return view("business.edit", [
            "business" => $business,
            'categories' => Category::all(),
            'id' => $id,
        ]);
    }

    //update business
    //only manager can update business

    public function update(Request $request, $id)
    {
        $business = Business::find($id);


        if ($business->manager_id != auth()->user()->id and !(auth()->user()->role == 'admin')) {
            abort(403, "Unauthorized action");
        }

        $formFields = $request->validate([
            "name" => "required",
            "address" => "required",
            "category_id" => "required",
        ]);
        if($request->hasFile('businessImg'))
        {
            $formFields['businessImg'] = $request->file('businessImg')->store('businessImages', 'public');
        }

        $formFields["manager_id"] = $business->manager_id;
        
        $business->update($formFields);

        //redirect previous page
        return back()->with('message', 'Your Busines has been updated');
        
    }

    //delete business
    public function destroy($id)
    {

        $business = Business::find($id);
        if(!auth() ->check()){
            abort(403, "Unauthorized action");
        }
        if ($business->manager_id != auth()->user()->id and !(auth()->user()->role == 'admin')) {
            abort(403, "Unauthorized action");
        }

        $business->delete();
        return redirect("/");
    }

}
