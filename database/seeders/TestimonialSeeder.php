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
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/Screen-Shot-2022-06-09-at-13.41.25.png',
                'text' => "Coding is so much fun. And the best part is that I can make my own game with my own rules. It's interesting.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'George',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_1771.jpg',
                'text' => "George suka coding. George ingin buat game tentang birhtday cake karena George mau ulang tahun.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jovano',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_1775.jpg',
                'text' => "I didn't like coding, but as soon i joined Cotha, i found out that coding is actually easy and fun.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_32F1307A40D0-1.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Owen',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_894C594B547B-1.jpeg',
                'text' => "Python ternyata tidak susah. Gak sabar belajar buat game pakai Unity juga.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alexander',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_1770.jpg',
                'text' => "I love coding. I want to be game developer.",
                'isFeatured' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Darren',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/Screen-Shot-2022-06-09-at-13.33.25.png',
                'text' => "Coding is fun and i can use my spare time productively",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_32F1307A40D0-1.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_32F1307A40D0-1.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ardo',
                'photo' => 'https://cotha.id/wp-content/uploads/2022/06/IMG_32F1307A40D0-1.jpeg',
                'text' => "Buat animasi itu seru dan asyik. Buat coding juga tidak susah.",
                'isFeatured' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
