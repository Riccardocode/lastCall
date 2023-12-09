<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessApiController;

Route::get("/businesses",[BusinessApiController::class,"index"]);