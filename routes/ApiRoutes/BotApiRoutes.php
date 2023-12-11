<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotApiController;

Route::post("/proximity",[BotApiController::class,"proximity"]);