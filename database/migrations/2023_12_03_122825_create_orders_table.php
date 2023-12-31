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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime("orderDate");
            $table->enum("status", ['cart', 'ordered', 'delivered', 'cancelled']);
            $table->foreignId("user_id")->constrained(table:'users')->onDelete("cascade");
            $table->foreignId("business_id")->constrained(table:'business')->onDelete("cascade");
            $table->decimal("totalAmount", 8, 2)->nullable(true);
            $table->string("pickupToken", 6)->nullable(true);
            $table->dateTime('pickedupDateTime')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
