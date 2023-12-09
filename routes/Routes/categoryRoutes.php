<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

//show all the categories
Route::get('/categories', [CategoryController::class, "index"]);

//show category by id
Route::get("/categories/{id}", [CategoryController::class, "show"])->where("id","[0-9]+");

//show form to create category
Route::get("/categories/create", [CategoryController::class, "create"]);

// create category
Route::post("/categories", [CategoryController::class, "store"]);

//edit specific category
Route::get("/categories/{id}/edit", [CategoryController::class, "edit"])->where("id","[0-9]+");

//update category
Route::put("/categories/{id}", [CategoryController::class, "update"])->where("id","[0-9]+");

//delete category
Route::delete("/categories/{id}", [CategoryController::class, "destroy"])->where("id","[0-9]+");