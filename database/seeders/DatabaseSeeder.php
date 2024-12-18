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
            'family' => 'nasralezade',
            'mobile' => '09030422838'
        ]);
    }
}
