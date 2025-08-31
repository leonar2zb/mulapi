<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            ['code' => 'UY', 'name' => 'Uruguay'],
            ['code' => 'CU', 'name' => 'Cuba'],
        ];

        foreach ($items as $item) {
            DB::table('countries')->updateOrInsert(
                ['code' => $item['code']],
                [
                    'name' => $item['name'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
