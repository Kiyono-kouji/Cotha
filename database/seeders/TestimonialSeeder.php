<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::insert([
            [
                'name' => 'Noah',
                'photo' => 'Noah.png',
                'text' => "Coding is so much fun. And the best part is that I can make my own game with my own rules. It's interesting.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'George',
                'photo' => 'George.jpg',
                'text' => "George suka coding. George ingin buat game tentang birhtday cake karena George mau ulang tahun.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jovano',
                'photo' => 'Jovano.jpg',
                'text' => "I didn't like coding, but as soon i joined Cotha, i found out that coding is actually easy and fun.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'Ardo.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Owen',
                'photo' => 'Owen.jpeg',
                'text' => "Python ternyata tidak susah. Gak sabar belajar buat game pakai Unity juga.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alexander',
                'photo' => 'Alexander.jpg',
                'text' => "I love coding. I want to be game developer.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Darren',
                'photo' => 'Darren.png',
                'text' => "Coding is fun and i can use my spare time productively",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'Ardo.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'Ardo.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'Ardo.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
