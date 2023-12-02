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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 50)->nullable(false);
            $table->string('lastname', 50)->nullable(false);
            $table->string('email', 50)->nullable(false)->unique();
            $table->string('password', 255)->nullable(false);
            $table->string('phonenumber', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profileImg')->nullable();
            $table->enum('role', ['admin', 'user', 'restaurantManager'])->default('user');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
