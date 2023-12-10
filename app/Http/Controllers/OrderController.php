<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Business;
use App\Models\SalesLot;
use App\Models\OrderItem;
use Illuminate\Support\Str;
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

    public function paymentCrediCardDetails(Request $request)
    {

        return view('orders.creditCardDetails', [
            'totalAmount' => $request['totalAmount'],
            'order_id' => $request['order_id'],
        ]);
    }

    public function paymentConfirmation(Request $request)
    {
        $request->validate([
            'cardNumber' => [
                'required',
                'string',
                'regex:/^(?:\d{4}[\s]?){3}\d{4}$/'
            ],
            'expiryMonth' => 'required|digits:2',
            'expiryYear' => 'required|digits:4',
            'cardCVC' => 'required|digits:3',
            'totalAmount' => 'required|numeric|gt:0',
        ]);

        $order_id = $request['order_id'];
        $order = Order::find($order_id);
        if ($order && $order->status == 'cart' && $order->user_id == auth()->user()->id ) {
            //generate pickup token
            $pickupToken = Str::random(6);
            $order->update([
                'status' => 'ordered',
                'totalAmount' => $request['totalAmount'],
                'pickupToken' => $pickupToken,
            ]);
        }
        //here should be redirected to order page
        return redirect("/myorders")->with('message', 'Payment successfull. Go and pickup your order.');
    }


    //***************** Not used so far ****************************/
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

    //***************** Not used so far ****************************/
    public function show($id)
    {
        return view("orders.show", [
            "order" => Order::find($id)
        ]);
    }

    //******************** Not Used so far ************************/
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

    //*************** Manage User Orders View ************************/
    public function myOrders()
    {
        $user = auth()->user();
        
        // Orders to pick up
        $ordersToPickup = Order::with(['business', 'order_items'])
            ->where('user_id', $user->id)
            ->where('status', 'ordered')
            ->get()
            ->map(function ($order) {
                // Calculate the total amount for each order
                $totalAmount = $order->order_items->sum(function ($item) {
                    return $item->discounted_price * $item->quantity; // Assuming you have 'price' and 'quantity' fields
                });
                // Append the total amount to the order object
                $order->totalAmount = $totalAmount;
                return $order;
            });

        // Delivered orders
        $ordersDelivered = Order::with(['business', 'order_items'])
            ->where('user_id', $user->id)
            ->where('status', 'delivered')
            ->get()
            ->map(function ($order) {
                // Calculate the total amount for each order
                $totalAmount = $order->order_items->sum(function ($item) {
                    return $item->discounted_price * $item->quantity; // Assuming you have 'price' and 'quantity' fields
                });
                // Append the total amount to the order object
                $order->totalAmount = $totalAmount;
                return $order;
            });
            
        return view("orders.myOrders", [
            'user' => $user,
            "ordersToPickup" => $ordersToPickup,
            "ordersDelivered" => $ordersDelivered,
        ]);
    }


    //*************** Manage Business Manager Orders View ************************/
    public function businessManagerOrders(){
        //First I want to check for the manager Id
        $businessManager = User::find(auth()->user()->id);

        //than I retrieve the business of the manager
        $business = Business::where('manager_id', $businessManager->id)->first();
       
        //than I retrieve all the orders related to the business of the manager
        $orders = Order::with(['order_items.saleslot.product'])->where('business_id', $business->id)->get();
           
       
        //than I want to check the status of the orders and display them in the right view
        //status can be ordered, delivered, cancelled
        $ordered = $orders->where('status', 'ordered');
        $delivered = $orders->where('status', 'delivered');
        $cancelled = $orders->where('status', 'cancelled');

        //I create 3 variables to hold the orders with the right status and pass it to the view

        return view('orders.businessManagerOrders', [
            'ordered' => $ordered,
            'delivered' => $delivered,
            'cancelled' => $cancelled,
        ]);
    }

    public function managerConfirmPickedupOrder(Request $request){
        $order = Order::find($request->order_id);
       
        $business = Business::find($order->business_id);
        if(auth()->user()->id != $business->manager_id){
            abort(403);
        }
        if($order->status != 'ordered'){
            return redirect('/businessmanagerorders') -> with('message', 'Order not in picked up status');
        }
        
        if($order->pickupToken != $request->pickupToken){
            return redirect('/businessmanagerorders') -> with('message', 'Wrong pickup token');
        }
        $order->status = 'delivered';
        $order->pickupDateTime = now(); // Assuming you want to set the current date and time as the pickupDateTime
        $order->save();
        return redirect('/businessmanagerorders')->with('message', 'Order confirmed as picked up');

    }
}
