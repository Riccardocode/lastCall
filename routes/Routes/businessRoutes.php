<?php

use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;

// Show all Businesses
Route::get('/businesses', [BusinessController::class, "index"]);

// Show Business by Id
Route::get("/businesses/{id}", [BusinessController::class, "show"])->where("id","[0-9]+");

// Show form to create Business
Route::get("/businesses/create", [BusinessController::class, "create"]);

// Insert Business
Route::post("/businesses", [BusinessController::class, "store"]);

// Show Edit Form for specific Business
Route::get("/businesses/{id}/edit", [BusinessController::class, "edit"])->where("id","[0-9]+");

// Update specific Business
Route::put("/businesses/{id}", [BusinessController::class, "update"])->where("id","[0-9]+");

//Delete Business
Route::delete("/businesses/{id}", [BusinessController::class, "destroy"])->where("id","[0-9]+");