<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotApiController;

Route::get("/testy",[BotApiController::class,"testy"]);

Route::post("/proximity",[BotApiController::class,"proximity"]);