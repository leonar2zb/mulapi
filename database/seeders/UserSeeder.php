<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Testing user
        DB::table('users')->updateOrInsert(
            ['email' => 'test@example.com'], // this email just once
            [
                'name' => 'Test User',
                'password' => bcrypt('123'),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ]
        );
    }
}
