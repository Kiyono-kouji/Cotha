<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::insert([
            [
                'title' => 'Visual Coding',
                'subtitle' => 'Little Coder',
                'image' => 'VisualCoding.jpg',
                'age_range' => '5 - 7y',
                'description' => 'Level Little Coder dirancang untuk memperkenalkan dunia teknologi dan Computational Thinking pada anak di usia dini untuk meningkatkan minat mereka sehingga mereka siap belajar lebih banyak hal. Coding yang digunakan berbasis visual sehingga menarik dan menyenangkan dengan menggunakan berbagai aplikasi seperti Lightbot, Scratch Jr, Tynker & lainnya.',
                'slug' => 'vc',
                'active' => true,
                'isFeatured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Multi Media Tech',
                'subtitle' => 'Young Artist',
                'image' => 'MultimediaTech.jpg',
                'age_range' => '6 - 12y',
                'description' => 'Level Young Artist special dirancang bagi anak-anak yang sangat tinggi imajinasi dan kreativitasnya dan perlu wadah untuk menuangkannya. Pada level ini mereka akan belajar berbagai aplikasi multimedia untuk berkreasi sepuasnya dan menghasilkan karya yang dapat dinikmati. Aplikasi yang digunakan contohnya untuk digital graphic editing, video editing, 2D animation, 3D animation & lainnya.',
                'slug' => 'mmt',
                'active' => true,
                'isFeatured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Block Based Coding',
                'subtitle' => 'Junior Coder',
                'image' => 'BlockBasedCoding.jpg',
                'age_range' => '8 - 12y',
                'description' => 'Level Junior Coder spesial dirancang bagi anak usia >8th yang mulai tinggi rasa ingin tahunya dan siap mempelajari kemampuan baru di bidang technology. Coding yang dipelajari fokus untuk mengembangkan kemampuan Computational Thinking sehingga semakin cerdas & kreatif melalui aplikasi Scratch, Construct, Artificial Intelligence App, Machine Learning App & lainnya.',
                'slug' => 'bbc',
                'active' => true,
                'isFeatured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Real World Coding',
                'subtitle' => 'Teens Coder',
                'image' => 'RealWorldCoding.jpg',
                'age_range' => '13 - 17y',
                'description' => 'Level Teens Coder diharapkan sudah menguasai kemampuan Computational Thinking yang cukup matang sehingga siap untuk mempelajari algoritma pemrograman yang lebih rumit dan bisa diterapkan di dunia nyata seperti pembuatan website, program handphone dan real game. Coding yang dipelajari menggunakan text based yang cukup rumit seperti Phyton, HTML, CSS, C#, Unity & lainnya.',
                'slug' => 'rwc',
                'active' => true,
                'isFeatured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
