<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //all products
    public function index()
    {
        return view("products.index", [
            "products" => Product::with(["business"])->get(),
        ]);
    }

    public function businessIndex($business_id)
    {
        $business = Business::find($business_id);
        $products = Product::where("business_id", $business_id)
            ->with(['saleslots' => function ($query) {
                $query->where('current_quantity', '>', 0) // Filter by current_quantity > 0
                    ->whereDate('end_date', '>', now()) // Filter by end_date > current date
                    ->latest('created_at'); // Order Saleslot records by created_at in descending order
            }])
            ->get();

        return view("products.businessIndex", [
            "products" => $products,
            "business" => $business,

        ]);
    }

    //product by id
    public function show($business_id, $product_id)
    {
        return view("products.show", [
            "product" => Product::find($product_id),
            "business_id" => $business_id,
        ]);
    }

    //show form to create product
    public function create($business_id)
    {
        $business = Business::find($business_id);
        if (auth()->user()->role != "restaurantManager" and auth()->user()->role != "admin" and auth()->user()->id != $business->manager_id) {
            abort(403, "Unauthorized action");
        }
        return view(
            "products.create",
            [
                "business_id" => $business_id,
            ]
        );
    }

    //add product to database
    public function store(Request $request, $business_id)
    {
        $formFields = $request->validate([
            "name" => "required",
            "category" => "required",
            "ingredientString" => "required",
            "allergyString" => "required",
            "picture" => ["image", "mimes:png,jpg,jpeg", "max:2048"]
        ]);

        if ($request->hasFile("picture")) {
            $formFields["picture"] = $request->file("picture")->store("productPictures", "public");
        }

        //! need to fetch business not sure yet how this works since business not available yet
        $formFields["business_id"] = $business_id;


        Product::create($formFields);

        return redirect("/business/{$business_id}/products")->with("message", "Product created Successfully!");
    }

    //show edit form
    public function edit($business_id, $product_id)
    {
        $product = Product::find($product_id);
        $business = Business::find($product->business_id);

        //! not sure yet how to call business id
        if ($business->manager_id != auth()->user()->id and !(auth()->user()->role == 'admin')) {
            abort(403, "Unauthorized action");
        }

        return view("products.edit", [
            "product" => $product,
            "business_id" => $business_id,
            "product_id" => $product_id,
        ]);
    }

    //update product in db
    public function update(Request $request, $business_id, $product_id)
    {
        $product = Product::find($product_id);
        $business = Business::find($product->business_id);

        //! not sure yet how to call business id
        if ($business->manager_id != auth()->user()->id and !(auth()->user()->role == 'admin')) {
            abort(403, "Unauthorized action");
        }

        $formFields = $request->validate([
            "name" => "required",
            "category" => "required",

            "ingredientString" => "required",
            "allergyString" => "required",
            "picture" => ["image", "mimes:png,jpg,jpeg", "max:2048"]
        ]);

        if ($request->hasFile("picture")) {
            $formFields["picture"] = $request->file("picture")->store("productPictures", "public");
        }
        $formFields["business_id"] = $product->business_id;


        $product->update($formFields);

        return redirect("/business/{$business_id}/products")->with("message", "Updated Successfully!");
    }

    //delete product from the db
    public function destroy($business_id, $product_id)
    {
        $product = Product::find($product_id);

        //! not sure yet how to call business id
        if ($product->business->manager_id != auth()->user()->id and !(auth()->user()->role == 'admin')) {
            abort(403, "Unauthorized action");
        }

        $product->delete();

        return redirect("/business/{$business_id}/products")->with("message", "Product deleted successfully!");
    }

    //show all Products of a user
    public function manage($business_id)
    {
        //! not sure yet since no business 
        return view("products.manage", [
            "products" => auth()->user()->products
        ]);
    }
}
