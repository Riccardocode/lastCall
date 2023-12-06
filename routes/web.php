<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});
//Routes for users management (In case of Routing Issues with users, Refer to Riccardo)
require __DIR__.'/Routes/userRoutes.php';

//Routes for Products management (In case of Routing Issues with users, Refer to Brandon)
require __DIR__."/Routes/productRoutes.php";

//Routes for order management
require __DIR__."/Routes/orderRoutes.php";

//Routes for business management
require __DIR__.'/Routes/businessRoutes.php';

//Routes for category management
require __DIR__.'/Routes/categoryRoutes.php';

//Route for manage the Sales Lot (Refer to Riccardo)
require __DIR__.'/Routes/salesLotRoutes.php';



require __DIR__."/Routes/mapRoutes.php";