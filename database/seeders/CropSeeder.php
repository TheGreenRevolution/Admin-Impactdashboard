<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define crop data for sustainable building materials
        $crops = [
            ['name' => 'Hemp', 'co2_sequestration_rate' => 15.1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bamboo', 'co2_sequestration_rate' => 12.3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flax', 'co2_sequestration_rate' => 8.7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mammoth Grass', 'co2_sequestration_rate' => 20.5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kenaf', 'co2_sequestration_rate' => 18.0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cork', 'co2_sequestration_rate' => 7.4, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('crops')->insert($crops);
    }
}
