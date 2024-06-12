<?php

namespace Database\Seeders;

use App\Models\ProductionLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductionLocation::factory(10)->create();
    }
}
