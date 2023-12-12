<?php
//Refer to Riccardo
// to manage the Sales lot user needs to be logged in 
// as Manager for the business. Chain of query 
// from salesLot->Product->Business->User

// Features to implement:
// - Show all Sales Lot of a business (sales history business)
// - Show all current active Sales Lot of a business(Active sales lot)
// - Show all Sales Lot of a product (sales history product)
// - Show current sale of a product (active sales lot product)

// - Manage Sales Lot (CRUD)

// - Edit a Sales Lot (this is related to a specific product. Only if the Sales Lot is active)
// - Show a Sales Lot (this is related to a specific product)
// - Delete a Sales Lot (this is related to a specific product. Only if the Sales Lot is active)
//          Question? What happens to the order items that are related to the Sales Lot that is deleted?

use App\Http\Controllers\SalesLotController;
use Illuminate\Support\Facades\Route;


// - Manage Sales Lot (CRUD)
// - Show all Sales Lot of a product (sales history product) TOFIX
Route::get("/products/{product_id}/saleslot", [SalesLotController::class, "index"]);

// - Create a new Sales Lot (this is related to a specific product)
Route::get("business/{business_id}/products/{product_id}/saleslot/create", [SalesLotController::class, "create"])->where("business_id","[0-9]+")->where("product_id","[0-9]+")->middleware("auth");

// - Add a new Sales Lot (this is related to a specific product)
Route::post('/business/{business_id}/products/{product_id}/saleslot', [SalesLotController::class, 'store'])->where("business_id","[0-9]+")->where("product_id","[0-9]+")->middleware('auth');

// - Edit a Sales Lot (this is related to a specific product. Only if the Sales Lot is active)
Route::get("/business/{business_id}/products/{product_id}/saleslot/{saleslot_id}/edit", [SalesLotController::class, "edit"])->where("business_id","[0-9]+")->where("product_id","[0-9]+")->where("saleslot_id","[0-9]+")->middleware('auth');

// - Update a Sales Lot (this is related to a specific product. Only if the Sales Lot is active)
Route::put("/products/{product_id}/saleslot/{salesLot_id}", [SalesLotController::class, "update"])->middleware("auth");

// - Delete a Sales Lot (this is related to a specific product. Only if the Sales Lot is active)
Route::delete("/products/{product_id}/saleslot/{salesLot_id}", [SalesLotController::class, "destroy"])->middleware("auth");

// - Manage view for Sales Lot
Route::get("/products/{product_id}/saleslot/manage", [SalesLotController::class, "manage"])->middleware("auth");

// //All Products
// Route::get("/saleslot", [ProductController::class, "index"]);

// //Single Product by Id
// Route::get("/saleslot/{id}", [ProductController::class, "show"])->where("id","[0-9]+");

// //Show form to create Product
// Route::get("/saleslot/create", [ProductController::class, "create"])->middleware("auth");

// //Add Product to the Database
// Route::post("/saleslot", [ProductController::class, "store"])->middleware("auth");

// //Show form to edit Product
// Route::get("/saleslot/{id}/edit", [ProductController::class, "edit"])->where("id","[0-9]+")->middleware("auth");

// //Update product in the database
// Route::put("/saleslot/{id}", [ProductController::class, "update"])->where("id","[0-9]+")->middleware("auth");

// //Delete Product from the database
// Route::delete("/saleslot/{id}", [ProductController::class, "destroy"])->where("id","[0-9]+")->middleware("auth");

// //Show all Products of of a user + edit/delete options
// Route::get("/saleslot/manage", [ProductController::class, "manage"])->middleware("auth");
