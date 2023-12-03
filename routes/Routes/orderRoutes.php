<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//All Orders
Route::get("/orders", [OrderController::class, "index"])->middleware("auth");

//Single Order by Id
Route::get("/orders/{id}", [OrderController::class, "show"])->where("id", "[0-9]+")->middleware("auth");

//Add order to Database
Route::post("/orders", [OrderController::class, "store"])->middleware("auth");

//Show all orders of related to user
Route::get("/myOrders", [OrderController::class, "orders"])->middleware("auth");
