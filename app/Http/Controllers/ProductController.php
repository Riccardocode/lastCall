<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //all products
    public function index(){
        return view("products.index", [
            "products" => Product::all()
        ]);
    }

    //product by id
    public function show($id){
        return view("products.show", [
            "product" => Product::find($id)
        ]);
    }

    //show form to create product
    public function create(){
        return view("products.create");
    }

    //add product to database
    public function store(Request $request){
        $formFields = $request->validate([
            "name" => "required",
            "category" => "required",
            "quantity" => ["required","numeric","integer","gt:0"],
            "ingredientString" => "required",
            "allergyString" => "required",
            "picture" => ["image","mimes:png,jpg,jpeg","max:2048"]
        ]);

        if($request->hasFile("picture")){
            $formFields["picture"] = $request->file("picture")->store("productPictures", "public");
        }

        //! need to fetch business not sure yet how this works since business not available yet
        $formFields["business_id"] = auth()->user()->business_id;

        Product::create($formFields);

        return redirect("/manage")->with("message", "Product created Successfully!");
    }

    //show edit form
    public function edit($id){
        $product = Product::find($id);

        //! not sure yet how to call business id
        if($product->business_id != auth()->user()->business_id ){
            abort(403, "Unauthorized action");
        }

        return view("products.edit", [
            "product" => $product
        ]);
    }

    //update product in db
    public function update(Request $request, $id){
        $product = Product::find($id);

        //! not sure yet how to call business id
        if($product->business_id != auth()->user()->business_id ){
            abort(403, "Unauthorized action");
        }

        $formFields = $request->validate([
            "name" => "required",
            "category" => "required",
            "quantity" => ["required","numeric","integer","gt:0"],
            "ingredientString" => "required",
            "allergyString" => "required",
            "picture" => ["image","mimes:png,jpg,jpeg","max:2048"]
        ]);

        if($request->hasFile("picture")){
            $formFields["picture"] = $request->file("picture")->store("productPictures", "public");
        }

        $product->update($formFields);

        return redirect("/products/". $product->id)->with("message", "Updated Successfully!");
    }

    //delete product from the db
    public function destroy($id){
        $product = Product::find($id);

        //! not sure yet how to call business id
        if($product->business_id != auth()->user()->business_id ){
            abort(403, "Unauthorized action");
        }

        $product->delete();

        return redirect("/products/manage")->with("message","Product deleted successfully!");
    }

    //show all Products of a user
    public function manage(){
        //! not sure yet since no business 
        return view("products.manage",[
            "products" => auth()->user()->products
        ]);
    }
}
