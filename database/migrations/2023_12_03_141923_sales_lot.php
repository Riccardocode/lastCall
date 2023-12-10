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
        
        Schema::create('sales_lots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained(table:'products')->onDelete('cascade');
            $table->text('description')->nullable(false);
            $table->decimal('price', 8, 2)->nullable(false);
            $table->integer('initial_quantity')->nullable(false);
            $table->integer('current_quantity')->nullable(false);
            $table->integer('discount')->nullable(false);
            $table->timestamp('start_date')->nullable(false);
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_lots');
    }
};
