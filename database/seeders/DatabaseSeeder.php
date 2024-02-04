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
        $test_user = \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);
        $token = $test_user->createToken($test_user->name)->plainTextToken;
        echo "Api Token for Test User:". $token.'\n';
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
