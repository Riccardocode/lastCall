<?php

use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;

// Route::match(['get','post'], '/botman', 'App\Http\Controllers\BotManController@handle');

Route::match(['get','post'], '/botman', [BotManController::class, 'input']);

Route::get('/test', [BotManController::class, 'testDump']);