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
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->float('lat', 10, 6); // Latitude with 6 decimal places
            $table->float('long', 11, 6); // Longitude with 6 decimal places
            $table->timestamps(); // Optional, but useful for tracking when records are created or updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maps');
    }
};
