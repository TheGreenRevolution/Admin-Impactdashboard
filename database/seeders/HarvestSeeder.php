<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HarvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $harvests = [
            [
                'start_period' => '2023-01-01',
                'end_period' => '2023-01-31',
                'weight' => 100.50,
                'crop_Id' => 1,
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_period' => '2023-02-01',
                'end_period' => '2023-02-28',
                'weight' => 150.75,
                'crop_id' => 2,
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_period' => '2023-03-01',
                'end_period' => '2023-03-31',
                'weight' => 200.25,
                'crop_id' => 3,
                'company_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('harvests')->insert($harvests);
    }
}
