<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "quantity",
        "order_id",
        "sales_lots_id",
        "discounted_price",
    ];


    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function saleslot(){
        return $this->belongsTo(SalesLot::class, 'sales_lots_id', 'id');
    }

}
