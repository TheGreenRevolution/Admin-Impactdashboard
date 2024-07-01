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
        Schema::table('production_locations', function (Blueprint $table) {
            $table->float('lat', 10, 6)->nullable()->after('full_address'); 
            $table->float('lng', 11, 6)->nullable()->after('lat'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('production_locations', function (Blueprint $table) {
            //
        });
    }
};
