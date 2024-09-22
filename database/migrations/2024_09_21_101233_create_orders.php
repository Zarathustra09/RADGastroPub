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
            $table->unsignedBigInteger('menu_id'); // Foreign key referencing the menus table
            $table->unsignedBigInteger('user_id'); // Foreign key referencing the users table (regular user)
            $table->integer('quantity'); // Quantity ordered
            $table->decimal('total_price', 10, 2); // Total price for the order
            $table->enum('item_type', ['empanada', 'sinanglao']); // Type of item
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
