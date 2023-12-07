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
    ];


    public function order(){
        $this->belongsTo(Order::class);
    }

    public function saleslot(){
        $this->belongsTo(SalesLot::class);
    }

}
