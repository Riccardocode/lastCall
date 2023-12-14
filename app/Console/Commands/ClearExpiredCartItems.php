<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClearExpiredCartItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-expired-cart-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('ClearExpiredCartItems: Starting command execution.');
        // Fetch all OrderItems that are in cart status
        $cartItems = OrderItem::whereHas('order', function ($query) {
            $query->where('status', 'cart');
        })->get();
        $orders = Order::with('order_items')->where('status', 'cart')->get();    
        
        //if there are items in the cart
        if ($cartItems->count() > 0) {
            
            foreach ($cartItems as $item) {
                $salesLotEnd = $item->saleslot->end_date;
                
                //The time when the item has been added to cart
                $itemAddedToCartTime = $item->created_at;

                if($itemAddedToCartTime){
                    $timeToLeaveCart = $itemAddedToCartTime->addMinutes(20);
                    Log::info('ExpiredItems:', ['timeToLeaveCart' => $timeToLeaveCart]);
                }

                if (now()->greaterThan($timeToLeaveCart) || now()->greaterThan($salesLotEnd)) {
                    // Remove the item from the cart and update SalesLot quantity
                    $item->saleslot->increment('current_quantity', $item->quantity);
                    $item->delete();
                }
            }
        }
        if($orders->count() > 0){
            foreach($orders as $order){
                if($order->order_items->count() == 0){
                    $order->delete();
                }
            }
        }
        Log::info('ClearExpiredCartItems: Finished execution for Clean Cart Scheduled task.');
    }
}
