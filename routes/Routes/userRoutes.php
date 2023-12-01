<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

//Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Add user to database
Route::post('/users',[UserController::class, 'store'])->middleware('guest');

//Logout from user session
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form
//Added a name to the route so that we can use it through middleware
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log user in
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');

//manage and display all users
Route::get('/users',[UserController::class, 'manage'])->middleware('auth');

//Display Single User
Route::get('/users/{id}',[UserController::class, 'userDetails'])
    ->where('id', '[0-9]+')->middleware('auth');

//Show edit form
Route::get('/users/{id}/edit',[UserController::class, 'edit'])
->where('id', '[0-9]+')
->middleware('auth');

//Update User
Route::put('/users/{id}', [UserController::class, 'update'])
    ->where('id', '[0-9]+')
    ->middleware('auth');

//Delete user
Route::delete('/users/{id}',[UserController::class, 'destroy'])
    ->where('id', '[0-9]+')->middleware('auth');