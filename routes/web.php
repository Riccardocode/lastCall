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

Route::get("/", function(){
    return view("homeage");
});

//Routes for users management (In case of Routing Issues with users, Refer to Riccardo)
require __DIR__.'/Routes/userRoutes.php';


require __DIR__."/Routes/productRoutes.php";

//Routes for order management
require __DIR__."/Routes/orderRoutes.php";

//Routes for business management
require __DIR__.'/Routes/businessRoutes.php';

//Routes for category management
require __DIR__.'/Routes/categoryRoutes.php';

//Routes for the Sales Lots functions and pages
require __DIR__.'/Routes/salesLotRoutes.php';

//Routes for the mainPage and its functions
require __DIR__.'/Routes/homePageRoutes.php';

//Routes for the map page and its functions
require __DIR__."/Routes/mapRoutes.php";

//Routes for category management
require __DIR__.'/Routes/chatbotRoutes.php';