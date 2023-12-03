<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    
    public function index(){
        return view("businesses.index", [
            "businesses" => Business::all()
        ]);
    }

    
    public function show($id){
        return view("businesses.show", [
            "business" => Business::find($id)
        ]);
    }

    
    public function create(){
        return view("businesses.create");
    }

    
    public function store(Request $request){
        $formFields = $request->validate([
            "name" => "required",
            "address" => "required",
        ]);

        
        Business::create($formFields);

        return redirect("/");
    }

    
    public function edit($id){
        $business = Business::find($id);

        if($business->manager_id != auth()->user()->id ){
            abort(403, "Unauthorized action");
        }

        return view("businesses.edit", [
            "business" => $business
        ]);
    }

    
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

    
    public function destroy($id){
        $business = Business::find($id);
        if($business->manager_id != auth()->user()->id ){
            abort(403, "Unauthorized action");
        }

        $business->delete();
        return redirect("/");
    }
}
