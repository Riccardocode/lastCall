<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


//See all products regardless of the user
Route::get("/business/products", [ProductController::class, "index"]);

//See all products of a user
//anyone can see
Route::get("/business/{business_id}/products", [ProductController::class, "businessIndex"])->where("business_id","[0-9]+");

//Single Product by Id
Route::get("/business/{business_id}/products/{product_id}", [ProductController::class, "show"])->where("business_id","[0-9]+")->where("product_id","[0-9]+");

//Show form to create Product
//Only manager and Admin can create product
Route::get("/business/{business_id}/products/create", [ProductController::class, "create"])->where("business_id","[0-9]+")->where("product_id","[0-9]+")->middleware("auth");

//Add Product to the Database
//Only manager and Admin can create product
Route::post("/business/{business_id}/products", [ProductController::class, "store"])->where("business_id","[0-9]+")->middleware("auth");

//Show form to edit Product
//Only manager and Admin can edit product
Route::get("/business/{business_id}/products/{product_id}/edit", [ProductController::class, "edit"])->where("business_id","[0-9]+")->where("product_id","[0-9]+")->middleware("auth");

//Update product in the database
//Only manager and Admin can edit product
Route::put("/business/{business_id}/products/{product_id}", [ProductController::class, "update"])->where("business_id","[0-9]+")->where("product_id","[0-9]+")->middleware("auth");

//Delete Product from the database
//Only manager and Admin can delete product
Route::delete("/business/{business_id}/products/{product_id}", [ProductController::class, "destroy"])->where("business_id","[0-9]+")->where("product_id","[0-9]+")->middleware("auth");

//Show all Products of of a user + edit/delete options
//Only manager and Admin can see and edit products
Route::get("/business/{business_id}/products/manage", [ProductController::class, "manage"])->where("business_id","[0-9]+")->middleware("auth");
