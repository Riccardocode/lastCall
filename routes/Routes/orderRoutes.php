<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//All Orders
// Route::get("/orders", [OrderController::class, "index"])->middleware("auth");

// Route::get("/orders/{user_id}", [OrderController::class, "viewCart"])->middleware("auth");

//Single Order by Id
// Route::get("/orders/{id}", [OrderController::class, "show"])->where("id", "[0-9]+")->middleware("auth");

// //Add order to Database
// Route::post("/orders", [OrderController::class, "store"])->middleware("auth");
Route::post("/orders", [OrderController::class, "addToCart"])->middleware("auth");

// View Carts
Route::get("/orders/cart", [OrderController::class, "viewCart"])->middleware("auth");

// get payment view
// Route::get("/orders/cart/payment", [OrderController::class, "paymentCrediCardDetails"])->middleware("auth");

Route::post("/orders/cart/payment", [OrderController::class, "paymentCrediCardDetails"])->middleware("auth");
Route::post("/orders/cart/payment/confirmation", [OrderController::class, "paymentConfirmation"])->middleware("auth");

//Show all orders of related to user
Route::get("/myorders", [OrderController::class, "myOrders"])->middleware("auth");
//Show and manage the orders related to a business manager
Route::get("/businessManagerOrders", [OrderController::class, "businessManagerOrders"])->middleware("auth");

//Remove OrderItem from Cart
Route::delete("/orders/{order_id}/{order_item_id}", [OrderController::class, "removeFromCart"])->where("id", "[0-9]+")->middleware("auth");
