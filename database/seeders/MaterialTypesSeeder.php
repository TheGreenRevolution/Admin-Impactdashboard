<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('end_material_types')->insert([
            [
                'name' => 'Bricks',
                'description' => 'Durable and strong material used in construction.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Insulation',
                'description' => 'Material used to insulate buildings and reduce energy consumption.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Concrete',
                'description' => 'Composite material composed of fine and coarse aggregate bonded together with a fluid cement.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Steel',
                'description' => 'Strong and durable material commonly used in construction and manufacturing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wood',
                'description' => 'Natural material used for construction and furniture making.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
