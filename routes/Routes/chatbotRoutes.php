<?php

use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;

// Route::match(['get','post'], '/botman', 'App\Http\Controllers\BotManController@handle');

Route::match(['get','post'], '/botman', [BotManController::class, 'inputTest']);

Route::get('/test', [BotManController::class, 'testDump']);