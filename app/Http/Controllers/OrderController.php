<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Business;
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
        $price = $request['discountedPrice'];
        $salesLot = SalesLot::find($salesLotId);
        // Check for SalesLot validity
        if (!$salesLot || $salesLot->current_quantity < $quantity || $salesLot->end_date < now()) {
            // Handle invalid SalesLot
            return redirect()->back()->with('error', 'Unable to add item to cart.');
        }

        $businessId = $salesLot->product->business_id; // Assuming SalesLot is related to Product which is related to Business

        // Using firstOrCreate with business_id included
        $order = Order::firstOrCreate(
            ['user_id' => $userId, 'status' => 'cart', 'business_id' => $businessId],
            ['orderDate' => now() /* other default attributes */]
        );

        $order->order_items()->create([
            'order_id' => $order->id,
            'quantity' => $quantity,
            'sales_lots_id' => $salesLotId, // Link the order item with the sales lot
            'discounted_price' => $price
            /* other attributes */
        ]);

        // Update SalesLot quantity
        $salesLot->decrement('current_quantity', $quantity);
        return redirect()->back()->with('message', 'Item added to cart');
    }

    public function viewCart()
    {
        $userId = auth()->id(); // Assuming the user is authenticated

        // Retrieve the user's cart
        $carts = Order::with(['order_items.saleslot.product'])
            ->where('user_id', $userId)
            ->where('status', 'cart')
            ->get();

        // dd($carts);

        if ($carts) {
            foreach ($carts as $cart) {
                // Calculate the total amount for each cart
                $totalAmount = 0;

                foreach ($cart->order_items as $item) {
                    $totalAmount += $item->quantity * $item->discounted_price; // Assuming discounted_price is in OrderItem
                }
                $cart['totalAmount'] = $totalAmount;
                $cart['businessName'] = Business::find($cart->business_id)->name;
            }
            
            // Pass the cart and total amount to the view
            return view('orders.viewCart', ['carts' => $carts]);
        } else {
            // Handle the case where there is no active cart
            return view('orders.emptyCart');
        }
    }


    public function removeFromCart($order_id, $order_item_id)
    {
        $userId = Order::find($order_id)->user_id;
        if ($userId != auth()->user()->id) {
            abort(403); // Unauthorized
        }

        $orderItem = OrderItem::find($order_item_id);
        if ($orderItem) {
            $order = Order::where('id', $orderItem->order_id)
                ->where('user_id', $userId)
                ->where('status', 'cart')
                ->first();

            if ($order) {
                $salesLot = $orderItem->saleslot;
                $orderItem->delete();

                // Update SalesLot quantity
                $salesLot->increment('current_quantity', $orderItem->quantity);

                // Check if the order has any other items left, if not, delete or update the order
                if ($order->order_items()->count() == 0) {
                    $order->delete(); // or update status to indicate an empty cart
                }
            }
        }
        return redirect("/orders/cart")->with('message', 'Item removed from cart');
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
