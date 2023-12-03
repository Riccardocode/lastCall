<?php

use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;

Route::get('/businesses', [BusinessController::class, "index"]);

Route::get("/businesses/{id}", [BusinessController::class, "show"])->where("id","[0-9]+");

Route::get("/businesses/create", [BusinessController::class, "create"]);

Route::post("/businesses", [BusinessController::class, "store"]);

Route::get("/businesses/{id}/edit", [BusinessController::class, "edit"])->where("id","[0-9]+");

Route::put("/businesses/{id}", [BusinessController::class, "update"])->where("id","[0-9]+");

Route::delete("/businesses/{id}", [BusinessController::class, "destroy"])->where("id","[0-9]+");