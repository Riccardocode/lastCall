<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

//Route for the home page
Route::get("/", [HomePageController::class, "home"]);

//Route for the About Us page
Route::get('/aboutUs', [HomePageController::class, "aboutUs"]);

//Route for the choosing page
Route::get("/choosing", [HomePageController::class, "choosing"]);

//Route to trigger choosing logic
Route::post("/choosing",[HomePageController::class, "getBy2kmRadius"]);

Route::get("/choosing/sell", [HomePageController::class, "sellPath"]);


