<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'mohamadreza',
            'email' => 'mohamadreza1388.org@gmail.com',
            'password' => '1A2A3b4b',
        ]);
    }
}
