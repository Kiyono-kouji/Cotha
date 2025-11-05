<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class1 = ClassModel::create([
            'title' => 'Basic Block Coding',
            'level' => 'B-01',
            'image' => 'https://your-image-url.com/block-coding.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari algoritma melalui pembuatan game online dengan menggunakan block based coding yang menarik dan menyenangkan.',
            'note' => 'Tidak perlu instal aplikasi khusus.',
            'concepts' => [
                'Loops sequences',
                'Iterative loops',
                'Conditionals',
                'Event Handling',
                'Variables',
            ],
            'projects' => [
                'Go Go Star',
                'Ghost Hunter',
                'Maze Runner',
                'Dino Jump',
                'Catch the Fruits',
                'Pong Game',
                'Space War',
                'Angry Bird',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+B01+(BasicBlockCodingJunior),+pertanyaan+saya&app_absent=0',
        ]);

        $class2 = ClassModel::create([
            'title' => 'Machine Learning & Artificial Intelligence',
            'level' => 'B-02',
            'image' => 'https://your-image-url.com/ml-ai.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari konsep dan cara kerja ML & AI yang merupakan konsep dasar dari teknologi robotik.',
            'requirements' => [
                'Computer/Laptop',
                'Smartphone',
            ],
            'concepts' => [
                'Basic Artificial Intelligence',
                'Basic Machine Learning',
                'Data training',
                'Classifier',
            ],
            'projects' => [
                'Smart Room',
                'Talking Hat',
                'Zombie Run',
                'Hand Gestures',
                'Piano',
                'Happy Me',
                "Don't be Shy",
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+B01+(BasicBlockCodingJunior),+pertanyaan+saya&app_absent=0',
        ]);

        $class3 = ClassModel::create([
            'title' => 'Interactive 2D Game Development',
            'level' => 'B-03',
            'image' => 'https://your-image-url.com/2d-game.png',
            'description' => 'Mengembangkan algoritma komplekas melalui pembuatan game 2D yang interaktif dan lebih menantang.',
            'meeting_info' => '20x @ 1 jam',
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+B01+(BasicBlockCodingJunior),+pertanyaan+saya&app_absent=0',
        ]);

        // Attach classes to courses
        $course = Course::where('slug', 'vc')->first();
        $course->classes()->attach([$class1->id, $class2->id, $class3->id, $class1->id, $class2->id]);
    }
}
