<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SalesLot;
use Illuminate\Http\Request;

class SalesLotController extends Controller
{

    // here shows all the saleslots available for a product
    //Maybe it is better to change this as it will always be just one 
    //saleslot per product active
    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        if (auth()->user()->id !== $product->business->manager_id && !(auth()->user()->role == 'admin')) {
            abort(403, 'Unauthorized action.');
        }
        $salesLots = SalesLot::where("product_id", $product_id)->get();
        return view(
            "saleslots.index",
            [
                "saleslots" => $salesLots,
            ]
        );
    }

    //create new saleslot
    public function create($business_id, $product_id)
    {
        $product = Product::with('business')->findOrFail($product_id);
        
        if (auth()->user()->id !== $product->business->manager_id && !(auth()->user()->role == 'admin')) {
            abort(403, 'Unauthorized action.');
        }
        return view("saleslots.create", [
            "product_id" => $product->id,
            "business_id" => $business_id,
            "product_name" => $product->name,
        ]);
    }

    //store new saleslot
    public function store(Request $request,$business_id, $product_id )
    {
        $product = Product::with('business')->findOrFail($product_id);
        if (auth()->user()->id !== $product->business->manager_id && !(auth()->user()->role == 'admin')) {
            abort(403, 'Unauthorized action.');
        }
        $formFields = $request->validate([
            'description' => ['required', 'string', 'max:255'],
            "initial_quantity" => ["required", "numeric", "integer", "gt:0"],
            'discount' => ['required', 'numeric', 'integer', 'min:0', 'max:100'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
            "price" => ["required", "numeric", "gt:0"],
        ]);
        $formFields["current_quantity"] = $formFields["initial_quantity"];
        $formFields["product_id"] = $product_id;

        SalesLot::create($formFields);

        return redirect("business/$business_id/products/$product_id")->with("message", "Saleslot created Successfully!");
    }

    public function edit($business_id,$product_id, $salesLot_id)
    {
        $product = Product::findOrFail($product_id);
        $salesLot = SalesLot::findOrFail($salesLot_id);

        if (auth()->user()->id !== $product->business->manager_id && auth()->user()->role != 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view("saleslots.edit", [
            "product_id" => $product_id,
            "salesLot" => $salesLot,
        ]);
    }
    public function update(Request $request, $product_id, $salesLot_id)
    {
        $product = Product::findOrFail($product_id);
        $salesLot = SalesLot::findOrFail($salesLot_id);

        if (auth()->user()->id !== $product->business->manager_id && auth()->user()->role != 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $formFields = $request->validate([
            'description' => ['required', 'string', 'max:255'],
            "initial_quantity" => ["required", "numeric", "integer", "gt:0"],
            "current_quantity" => ["required", "numeric", "integer", "gt:0"],
            'discount' => ['required', 'numeric', 'integer', 'min:0', 'max:100'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
            "price" => ["required", "numeric", "gt:0"],
        ]);

        $salesLot->update($formFields);

        return redirect("/products/$product_id/saleslot")->with("message", "Saleslot updated Successfully!");
    }

    public function destroy($product_id, $salesLot_id)
    {
        $product = Product::findOrFail($product_id);
        $salesLot = SalesLot::findOrFail($salesLot_id);

        if (auth()->user()->id !== $product->business->manager_id && auth()->user()->role != 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $salesLot->delete();

        return redirect("/products/$product_id/saleslot")->with("message", "Saleslot deleted Successfully!");
    }

    public function manage($product_id)
    {
        $product = Product::findOrFail($product_id);
        $salesLots = SalesLot::where("product_id", $product_id)->get();
        return view("saleslots.manage", [
            "saleslots" => $salesLots,
            'product_id' => $product_id,
            'product' => $product,
        ]);
    }
}
