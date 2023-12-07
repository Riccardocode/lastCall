<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SalesLot;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //all orders
    public function index()
    {
        return view("orders.index", [
            "orders" => Order::all()
        ]);
    }

    public function addToCart(Request $request)
    {

        $userId = $request['userId'];
        $salesLotId = $request['salesLotId'];
        $quantity = $request['quantity'];
        $price = $request['price'];
        $salesLot = SalesLot::find($salesLotId);
        // Check for SalesLot validity
        if (!$salesLot || $salesLot->current_quantity < $quantity || $salesLot->end_date < now()) {
            // Handle invalid SalesLot
        }

        $businessId = $salesLot->product->business_id; // Assuming SalesLot is related to Product which is related to Business

        // Using firstOrCreate with business_id included
        $order = Order::firstOrCreate(
            ['user_id' => $userId, 'status' => 'cart', 'business_id' => $businessId, 'totalAmount'=>$quantity * $price],
            ['orderDate' => now() /* other default attributes */]
        );

        $order->order_items()->create([
            'order_id' => $order->id,
            'quantity' => $quantity,
            'sales_lots_id' => $salesLotId, // Link the order item with the sales lot
            /* other attributes */
        ]);

        // Update SalesLot quantity
        $salesLot->decrement('current_quantity', $quantity);
    }
    public function removeFromCart($userId, $orderItemId)
    {
        $orderItem = OrderItem::find($orderItemId);
        if ($orderItem) {
            $order = Order::where('id', $orderItem->order_id)
                ->where('user_id', $userId)
                ->where('status', 'cart')
                ->first();

            if ($order) {
                $salesLot = $orderItem->saleslot; // Assuming correct relationship naming
                $orderItem->delete();

                // Update SalesLot quantity
                $salesLot->increment('current_quantity', $orderItem->quantity);

                // Check if the order has any other items left, if not, delete or update the order
                if ($order->orderItems()->count() == 0) {
                    $order->delete(); // or update status to indicate an empty cart
                }
            }
        }
    }

    public function checkoutCart($userId)
    {
        $order = Order::where('user_id', $userId)
            ->where('status', 'cart')
            ->first();

        if ($order) {
            // Update the status of the order to indicate checkout
            // The new status depends on your application's workflow (e.g., 'pending', 'completed')
            $order->update(['status' => 'pending']);

            // Further processing like payment handling can be added here

        } else {
            // Handle the case where the user does not have a cart
        }
    }







    public function checkCart()
    {
        $order = Order::where("user_id", auth()->user()->id)->where("status", "cart")->first();
        if ($order) {
            $orderItems = $order->orderItems;
            return view("orders.checkCart", [
                "orderItems" => $orderItems,
                "order" => $order
            ]);
        } else {
            return view("orders.emptyCart");
        }
    }

    //order by id
    public function show($id)
    {
        return view("orders.show", [
            "order" => Order::find($id)
        ]);
    }

    //add order
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "orderDate" => ["required", "date"],
            "totalAmount" => ["required", "decimal:0,2"],
            "status" => "required",
            "business_id" => ["required", "integer", "numeric"]
        ]);

        $formFields["user_id"] = auth()->user()->id;

        Order::create($formFields);

        return redirect("/")->with("message", "Order successfull");
    }

    //orders of a user
    public function myOrders()
    {
        return view("orders.myOrders", [
            "orders" => auth()->user()->orders
        ]);
    }
}
