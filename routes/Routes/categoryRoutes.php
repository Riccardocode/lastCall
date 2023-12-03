<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryController::class, "index"]);

Route::get("/categories/{id}", [CategoryController::class, "show"])->where("id","[0-9]+");

Route::get("/categories/create", [CategoryController::class, "create"]);

Route::post("/categories", [CategoryController::class, "store"]);

Route::get("/categories/{id}/edit", [CategoryController::class, "edit"])->where("id","[0-9]+");

Route::put("/categories/{id}", [CategoryController::class, "update"])->where("id","[0-9]+");

Route::delete("/categories/{id}", [CategoryController::class, "destroy"])->where("id","[0-9]+");