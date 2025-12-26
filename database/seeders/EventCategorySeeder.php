<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventCategory::insert([
            [
                'name' => 'Competitive Programming',
                'description' => 'Programming competitions focused on algorithmic problem-solving and coding challenges.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Computational Thinking',
                'description' => 'Events that develop logical thinking and problem-solving skills through computational methods.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Game Development',
                'description' => 'Competitions and workshops focused on creating video games and interactive applications.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Web Development',
                'description' => 'Events centered around building websites and web applications.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robotics',
                'description' => 'Robotics competitions and challenges involving hardware and programming.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
