<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //all orders
    public function index(){
        return view("orders.index",[
            "orders" => Order::all()
        ]);
    }

    //order by id
    public function show($id){
        return view("orders.show",[
            "order" => Order::find($id)
        ]);
    }

    //add order
    public function store(Request $request){
        $formFields = $request->validate([
            "orderDate" => ["required", "date"],
            "totalAmount" => ["required", "decimal:0,2"],
            "status" => "required",
            "business_id" => ["required","integer","numeric"]
        ]);

        $formFields["user_id"] = auth()->user()->id;

        Order::create($formFields);

        return redirect("/")->with("message", "Order successfull");
    }

    //orders of a user
    public function myOrders(){
        return view("orders.myOrders",[
            "orders" => auth()->user()->orders
        ]);
    }
}
