<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
            [
                'title' => 'Visual Coding',
                'subtitle' => 'Little Coder',
                'image' => 'https://cotha.id/wp-content/uploads/2022/06/Copy-of-Welcome-to-Cotha-Web-4.jpg',
                'age_range' => '5 - 7y',
                'description' => 'Level Little Coder dirancang untuk memperkenalkan dunia teknologi dan Computational Thinking pada anak di usia dini untuk meningkatkan minat mereka sehingga mereka siap belajar lebih banyak hal. Coding yang digunakan berbasis visual sehingga menarik dan menyenangkan dengan menggunakan berbagai aplikasi seperti Lightbot, Scratch Jr, Tynker & lainnya.',
                'slug' => 'vc',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Block Based Coding',
                'subtitle' => 'Junior Coder',
                'image' => 'https://cotha.id/wp-content/uploads/2022/06/12-2.jpg',
                'age_range' => '8 - 12y',
                'description' => 'Level Junior Coder spesial dirancang bagi anak usia >8th yang mulai tinggi rasa ingin tahunya dan siap mempelajari kemampuan baru di bidang technology. Coding yang dipelajari fokus untuk mengembangkan kemampuan Computational Thinking sehingga semakin cerdas & kreatif melalui aplikasi Scratch, Construct, Artificial Intelligence App, Machine Learning App & lainnya.',
                'slug' => 'bbc',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
