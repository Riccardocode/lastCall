<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotApiController;

Route::get("/businesses",[BotApiController::class,"index"]);