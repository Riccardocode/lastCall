<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            // decimal with 10 digits and 2 decimals
            $table->decimal("discounted_price",8,2);
            $table->foreignId("order_id")->constrained(table:'orders')->onDelete("cascade");
            $table->foreignId("sales_lots_id")->constrained(table:'sales_lots')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
