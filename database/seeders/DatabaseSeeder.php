<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Cotha Admin',
            'email' => 'Cotha@gmail.com',
            'password' => bcrypt('cothacotha123'),
            'isAdmin' => true,
        ]);

        User::factory()->create([
            'name' => 'Admin user',
            'email' => 'ffpcg6hfqdb@mkzaso.com',
            'password' => bcrypt('12345678'),
            'isAdmin' => true,
        ]);

        $this->call([
            MethodSeeder::class,
            TestimonialSeeder::class,
            LevelSeeder::class,
            ClassSeeder::class,
        ]);
    }
}
