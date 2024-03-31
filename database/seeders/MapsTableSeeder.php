<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $locations = [
            ['lat' => 50.4800375, 'long' => 5.628019], // Brussels
            ['lat' => 50.68047, 'long' => 4.65422], // Antwerp
            ['lat' => 50.7372426, 'long' => 5.0749803], // Leuven
            // Add more locations as needed
        ];

        foreach ($locations as $location) {
            DB::table('maps')->insert([
                'lat' => $location['lat'],
                'long' => $location['long'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
