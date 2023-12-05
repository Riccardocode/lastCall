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
        
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->foreignId('manager_id')->unique()->constrained(table:'users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained(table:'category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business');
    }
};
