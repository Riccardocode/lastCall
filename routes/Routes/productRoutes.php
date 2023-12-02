<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//All Products
Route::get("/products", [ProductController::class, "index"]);

//Single Product by Id
Route::get("/products/{id}", [ProductController::class, "show"])->where("id","[0-9]+");

//Show form to create Product
Route::get("/products/create", [ProductController::class, "create"])->middleware("auth");

//Add Product to the Database
Route::post("/products", [ProductController::class, "store"])->middleware("auth");

//Show form to edit Product
Route::get("/products/{id}/edit", [ProductController::class, "edit"])->where("id","[0-9]+")->middleware("auth");

//Update product in the database
Route::put("/products/{id}", [ProductController::class, "update"])->where("id","[0-9]+")->middleware("auth");

//Delete Product from the database
Route::delete("/products/{id}", [ProductController::class, "destroy"])->where("id","[0-9]+")->middleware("auth");

//Show all Products of of a user + edit/delete options
Route::get("/products/manage", [ProductController::class, "manage"])->middleware("auth");
