<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesLot extends Model
{
    use HasFactory;
    protected $table = 'sales_lots';
    protected $fillable = [
        'product_id',
        'description',
        'price',
        'initial_quantity',
        'current_quantity',
        'discount',
        'start_date',
        'end_date',
    ];

    public function product(){
        return $this->belongsTo(Product::class, "product_id", "id");
    }

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
}
