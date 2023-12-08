<?php

use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;

Route::get('/business', [BusinessController::class, "index"]);

Route::get("/business/{id}", [BusinessController::class, "show"])->where("id","[0-9]+");

Route::get("/business/create", [BusinessController::class, "create"]);

Route::post("/business", [BusinessController::class, "store"]);

Route::get("/business/{id}/edit", [BusinessController::class, "edit"])->where("id","[0-9]+");

Route::put("/business/{id}", [BusinessController::class, "update"])->where("id","[0-9]+");

Route::delete("/business/{id}", [BusinessController::class, "destroy"])->where("id","[0-9]+");
