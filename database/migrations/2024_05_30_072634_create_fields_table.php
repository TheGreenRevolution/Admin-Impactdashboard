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
        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('size')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('street')->nullable();
            $table->integer('zip')->nullable();
            $table->float('lat', 10, 6)->nullable(); // Latitude with 6 decimal places
            $table->float('long', 11, 6)->nullable(); // Longitude with 6 decimal places
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
