<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessApiController extends Controller
{
    
    public function index(){
        return Business::all()->toJson();
    }
}
