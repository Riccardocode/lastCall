<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    //Show all Businesses
    public function index(){
        return view("businesses.index", [
            "businesses" => Business::all()
        ]);
    }

    //Show specific Business
    public function show($id){
        return view("businesses.show", [
            "business" => Business::find($id)
        ]);
    }

    //show form to create business
    public function create(){
        return view("businesses.create");
    }

    //add business to database
    public function store(Request $request){
        $formFields = $request->validate([
            "name" => "required",
            "address" => "required",
        ]);

        
        Business::create($formFields);

        return redirect("/");
    }

    //show edit Form
    public function edit($id){
        $business = Business::find($id);

        if($business->manager_id != auth()->user()->id ){
            abort(403, "Unauthorized action");
        }

        return view("businesses.edit", [
            "business" => $business
        ]);
    }

    //update business
    public function update(Request $request, $id){
        $business = Business::find($id);

        
        if($business->manager_id != auth()->user()->id ){
            abort(403, "Unauthorized action");
        }

        $formFields = $request->validate([
            "name" => "required",
            "address" => "required",
        ]);

        $business->update($formFields);

        return redirect("/");
    }

    //delete business
    public function destroy($id){
        $business = Business::find($id);
        if($business->manager_id != auth()->user()->id ){
            abort(403, "Unauthorized action");
        }

        $business->delete();
        return redirect("/");
    }
}
