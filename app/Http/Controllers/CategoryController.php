<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view("categories.index", [
            "categories" => Category::all()
        ]);
    }

    
    public function show($id){
        return view("categories.show", [
            "category" => Category::find($id)
        ]);
    }

    
    public function create(){
        return view("categories.create");
    }

    
    public function store(Request $request){
        $formFields = $request->validate([
            "name" => "required",
        ]);

        
        Category::create($formFields);

        return redirect("/");
    }

    
    public function edit($id){
        $category = Category::find($id);

        // if($category->manager_id != auth()->user()->id ){
        //     abort(403, "Unauthorized action");
        // }

        return view("categories.edit", [
            "category" => $category
        ]);
    }

    
    public function update(Request $request, $id){
        $category = Category::find($id);

        
        // if($business->manager_id != auth()->user()->id ){
        //     abort(403, "Unauthorized action");
        // }

        $formFields = $request->validate([
            "name" => "required",
        ]);

        $category->update($formFields);

        return redirect("/");
    }

    
    public function destroy($id){
        $category = Category::find($id);
        // if($business->manager_id != auth()->user()->id ){
        //     abort(403, "Unauthorized action");
        // }

        $category->delete();
        return redirect("/");
    }
}
