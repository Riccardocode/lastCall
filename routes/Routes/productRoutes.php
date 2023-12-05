<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//See all products regardless of the user
Route::get("/business/products", [ProductController::class, "index"]);

//See all products of a user
//anyone can see
Route::get("/business/{id}/products", [ProductController::class, "businessIndex"]);

//Single Product by Id
Route::get("/business/{business_id}/products/{product_id}", [ProductController::class, "show"])->where("id","[0-9]+");

//Show form to create Product
//Only manager and Admin can create product
Route::get("/business/{business_id}/products/create", [ProductController::class, "create"])->middleware("auth");

//Add Product to the Database
//Only manager and Admin can create product
Route::post("/business/{business_id}/products", [ProductController::class, "store"])->middleware("auth");

//Show form to edit Product
//Only manager and Admin can edit product
Route::get("/business/{business_id}/products/{product_id}/edit", [ProductController::class, "edit"])->where("id","[0-9]+")->middleware("auth");

//Update product in the database
//Only manager and Admin can edit product
Route::put("/business/{business_id}/products/{product_id}", [ProductController::class, "update"])->where("id","[0-9]+")->middleware("auth");

//Delete Product from the database
//Only manager and Admin can delete product
Route::delete("/business/{business_id}/products/{product_id}", [ProductController::class, "destroy"])->where("id","[0-9]+")->middleware("auth");

//Show all Products of of a user + edit/delete options
//Only manager and Admin can see and edit products
Route::get("/business/{business_id}/products/manage", [ProductController::class, "manage"])->middleware("auth");
