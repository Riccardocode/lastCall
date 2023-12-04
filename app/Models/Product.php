<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category",
        "quantity",
        "ingredientString",
        "allergyString",
        "picture",
        "business_id"
    ];

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
    public function business(){
        return $this->belongsTo(Business::class);
    }
}
