<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "orderDate",
        "status",
        "user_id",
        "business_id",
        'totalAmount',
        'pickupToken',
        'pickedupDateTime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
}
