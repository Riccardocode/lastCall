<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

// Route::match(['get','post'], '/botman', 'App\Http\Controllers\BotManController@handle');

Route::match(['get','post'], '/botman', [BotManController::class, 'inputTest']);

Route::get('/test', [BotManController::class, 'testDump']);

Route::post('/gabagu', [HomePageController::class, 'choosing']);