<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $test_user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@example.com',
        ]);
        $token = $test_user->createToken($test_user->name)->plainTextToken;
        echo $token;
    }
}
