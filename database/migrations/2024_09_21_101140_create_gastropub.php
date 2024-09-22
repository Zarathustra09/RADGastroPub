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
        Schema::create('gastropub', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('The Gastropub');
            $table->text('address');
            $table->decimal('latitude', 10, 8); // Latitude for geolocation
            $table->decimal('longitude', 11, 8); // Longitude for geolocation
            $table->string('contact_number');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastropub');
    }
};
