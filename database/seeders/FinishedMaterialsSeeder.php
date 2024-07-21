<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinishedMaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('finished_materials')->insert([
            [
                'endmaterial_id' => 1, // Assuming this ID refers to a biobased material like 'Bricks'
                'name' => 'test1',
                '%_raw_material_used' => 75.00,
                'kg_per_m3' => 1800.00,
                'picture' => 'path/to/brick_picture.jpg',
                'description_of_end_of_life_scenario' => 'Recycling',
                'co2_emissions' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
                'company_id' => 1,
            ],
            [
                'endmaterial_id' => 2, // Assuming this ID refers to a biobased material like 'Insulation'
                'name' => 'test1',
                '%_raw_material_used' => 90.00,
                'kg_per_m3' => 30.00,
                'picture' => 'path/to/insulation_picture.jpg',
                'description_of_end_of_life_scenario' => 'Rebuy and reuse',
                'co2_emissions' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
                'company_id' => 1,
            ],
            [
                'endmaterial_id' => 3, // Assuming this ID refers to a biobased material like 'Concrete'
                'name' => 'test1',
                '%_raw_material_used' => 60.00,
                'kg_per_m3' => 2400.00,
                'picture' => 'path/to/concrete_picture.jpg',
                'description_of_end_of_life_scenario' => 'Burn them',
                'co2_emissions' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
                'company_id' => 1,
            ],
            [
                'endmaterial_id' => 4, // Assuming this ID refers to a biobased material like 'Steel'
                'name' => 'test1',
                '%_raw_material_used' => 50.00,
                'kg_per_m3' => 7850.00,
                'picture' => 'path/to/steel_picture.jpg',
                'description_of_end_of_life_scenario' => 'Recycling',
                'co2_emissions' => 75.00,
                'created_at' => now(),
                'updated_at' => now(),
                'company_id' => 1,
            ],
            [
                'endmaterial_id' => 5, // Assuming this ID refers to a biobased material like 'Wood'
                'name' => 'test1',
                '%_raw_material_used' => 95.00,
                'kg_per_m3' => 600.00,
                'picture' => 'path/to/wood_picture.jpg',
                'description_of_end_of_life_scenario' => 'Rebuy and reuse',
                'co2_emissions' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
                'company_id' => 1,
            ],
        ]);
    }
}
