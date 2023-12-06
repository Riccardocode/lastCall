<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

//Route for the home page
Route::get("/", [HomePageController::class, "home"]);

//Route for the choosing page
Route::get("/choosing", [HomePageController::class, "choosing"])->middleware("auth");


