<?php

namespace Database\Seeders;

use App\Models\Method;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Method::insert([
            [
                'title' => 'Computational Thinking',
                'image' => 'https://cotha.id/wp-content/uploads/2022/06/Copy-of-Copy-of-Welcome-to-Cotha-Web-3.jpg',
                'label' => 'METHOD 01',
                'description' => 'Enhance your computational thinking skills through problem decomposition, abstraction, pattern recognition, and algorithmic thinking. This method helps students break down complex problems and find effective solutions.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project Based Learning',
                'image' => 'https://cotha.id/wp-content/uploads/2022/06/4.jpg',
                'label' => 'METHOD 02',
                'description' => 'Experience fun learning by working on real projects. Project Based Learning encourages creativity, teamwork, and practical application of knowledge, making learning more engaging and meaningful.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Micro Class',
                'image' => 'https://cotha.id/wp-content/uploads/2022/06/5.jpg',
                'label' => 'METHOD 03',
                'description' => 'Micro Class ensures effective learning with small groups, allowing for more personalized attention from mentors and teachers, and better interaction among students.',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
