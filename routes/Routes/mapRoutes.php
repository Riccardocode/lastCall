<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

Route::get("/map",[MapController::class, "index"]);