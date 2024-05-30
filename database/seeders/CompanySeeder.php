<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['name' => 'The Green Revolution', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gramitherm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Exie', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Insert company data into the table
        DB::table('companies')->insert($companies);
    }
}
