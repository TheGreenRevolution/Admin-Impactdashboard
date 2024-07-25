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
        Schema::create('finished_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('endmaterial_id')->constrained('end_material_types'); // Foreign key to endmaterials table
            $table->decimal('%_raw_material_used', 5, 2); // Percentage of raw material used in the end product
            $table->decimal('kg_per_m3', 8, 2); // KG per cubic meter
            $table->string('picture')->nullable(); // Picture of the material
            $table->string('description_of_end_of_life_scenario'); // Description of end of life scenario
            $table->decimal('co2_emissions', 8, 2)->nullable(); // CO2 emissions by end of life
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finished_materials');
    }
};
