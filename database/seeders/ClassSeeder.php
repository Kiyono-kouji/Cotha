<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classb01 = ClassModel::create([
            'title' => 'Basic Block Coding',
            'level' => 'B-01',
            'image' => 'BasicBlockCoding.png',
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

        $classb02 = ClassModel::create([
            'title' => 'Machine Learning & Artificial Intelligence',
            'level' => 'B-02',
            'image' => 'MachineLearningAndArtificialIntelligence.png',
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
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+B02+(MLAIJunior),+pertanyaan+saya&app_absent=0',
        ]);

        $classb03 = ClassModel::create([
            'title' => 'Interactive 2D Game Development',
            'level' => 'B-03',
            'image' => 'Interactive2DGameDevelopment.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mengembangkan algoritma komplekas melalui pembuatan game 2D yang interaktif dan lebih menantang.',
            'note' => 'Tidak perlu instal aplikasi khusus.',
            'concepts' => [
                'Application Interface',
                'Layouts & Events',
                'Game Objects',
                'Game Elements',
                'Behaviors Logic',
                'Event Handling',
                'Manipulating Variables',
                'Layers',
            ],
            'projects' => [
                'The Platformer',
                'The Maze',
                'Falling Block',
                'Angry Bird',
                'Racing Car',
                'Fruit Ninja',
                'Path Finding',
                "Don't Drown",
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+B03+(Interactive2DGameDev),+pertanyaan+saya&app_absent=0',
        ]);

        $classb04 = ClassModel::create([
            'title' => 'Advanced Block Coding',
            'level' => 'B-04',
            'image' => 'AdvanceBlockCoding.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari algoritma yang kompleks melalui pembuatan game online dengan menggunakan block based coding yang menarik dan menyenangkan.',
            'note' => 'Tidak perlu instal aplikasi khusus.',
            'concepts' => [
                'Loops sequences',
                'Iterative loops',
                'Conditionals',
                'Event Handling',
                'Variables',
                'Messages',
                'Functions',
                'Library',
                'Block',
            ],
            'projects' => [
                'Birthday Cake',
                'Space Warrior',
                'Rock Papper Scissor',
                'Multiplayer Pong Game',
                'Clock Hop',
                'Shooter Space',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+daftar+kelas+B-04+Advanced+Block+Coding.+Nama+saya&app_absent=0',
        ]);

        $classb05 = ClassModel::create([
            'title' => 'Mobile Application Development',
            'level' => 'B-05',
            'image' => 'MobileApplicationDevelopment.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari algoritma dan design aplikasi melalui pembuatan berbagai aplikasi untuk mobile phone.',
            'requirements' => [
                'Computer/Laptop',
                'Smartphone',
            ],
            'concepts' => [
                'Basic App Design',
                'User Event Handling',
                'Camera Component',
                'Phone Sensor Integration',
                'Advance UI Components',
                'Layer Integration',
                'String based algorithms',
                'Basic MVC concept',
            ],
            'projects' => [
                'Say it',
                'Image recognizer',
                'The Translator',
                'Dice Rolling',
'                Temperature Converter',
                'Guess the Country',
                'Calculator',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+daftar+kelas+B-05+Mobile+Application+Development.+Nama+saya&app_absent=0',
        ]);

        $classm01 = ClassModel::create([
            'title' => '2D Animation & Drawing',
            'level' => 'M-01',
            'image' => '2DAnimationAndDrawing.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Membuat digital drawing dan 2D animasi untuk pembuatan gambar digital dan film animasi sederhana dengan menggunakan berbagai aplikasi digital drawing dan animasi.',
            'requirements' => [
                'Computer/Laptop dengan spesifikasi yang cukup untuk multimedia editing',
            ],
            'concepts' => [
                'Basic digitalization',
                'Keyframe concept',
                'Timeline concept',
                'In-Between',
                'Timing',
                'Squash & Stretch',
            ],
            'projects' => [
                'Gliding Ghost',
                'Bouncing Ball'.
                'Birthday Animation Card',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+M01(2DAnimation),+pertanyaan+saya&app_absent=0',
        ]);

        $classm02 = ClassModel::create([
            'title' => '3D Animation',
            'level' => 'M-02',
            'image' => '3DAnimation.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari konsep pembuatan 3D object dan 3D animasi menggunakan aplikasi Blender untuk digunakan sebagai object dalam game atau film 3 dimensi.',
            'requirements' => [
                'Computer/Laptop dengan spesifikasi yang cukup untuk multimedia editing',
            ],
            'concepts' => [
                'Modeling',
                'Texturing',
                'Lighting & Compositing',
                'Simulation',
                'Animation',
                'Rendering',
            ],
            'projects' => [
                'Cube Boy 3D character',
                'Environment',
                'Cute Ball Movie',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+M02(3DAnimation),+pertanyaan+saya&app_absent=0',
        ]);

        $classm03 = ClassModel::create([
            'title' => 'Photo & Video Editing',
            'level' => 'M-03',
            'image' => 'PhotoAndVideoEditing.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari cara melakukan digital photo editing serta video editing untuk membuat film dan cara upload ke Youtube.',
            'requirements' => [
                'Camera Smartphone',
                'Computer/Laptop dengan spesifikasi yang cukup untuk multimedia editing',
            ],
            'concepts' => [
                'Layer concept',
                'Selection & Removal',
                'Blending',
                'Compositing',
                'Timeline video',
                'Editing tools',
                'Video Properties',
                'Rendering',
                'Upload Youtube',
            ],
            'projects' => [
                'Blending digital image',
                'Short movie for youtube',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+M03(PhotoVideoEditing),+pertanyaan+saya&app_absent=0',
        ]);

        $classr01 = ClassModel::create([
            'title' => 'Python Programming',
            'level' => 'R-01',
            'image' => 'PythonProgramming.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari algoritma pemrograman dengan text based programming serta memahami cara menggunakan Python Programming Language.',
            'note' => 'Tidak perlu instal aplikasi khusus.',
            'concepts' => [
                'Conditions',
                'Iterative loops',
                'Sequences',
                'Modules',
                'Functions',
                'Nested Conditions',
                'Turtle',
                'Numpy',
                'Panda',
            ],
            'projects' => [
                'Introduce yourself',
                'Simple Counting Programs',
                'Cook Recipes',
                'Palindrome',
                'Drawing with Code',
                'Calculator',
                'Dictionary',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+R01,+pertanyaan+saya&app_absent=0',
        ]);

        $classr02 = ClassModel::create([
            'title' => 'OOP Algorithm for Game',
            'level' => 'R-02',
            'image' => 'OOPAlgorithmForGame.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari dasar konsep OOP (Object Oriented Programming) menggunakan Python dan C#.',
            'note' => 'Tidak perlu instal aplikasi khusus.',
            'concepts' => [
                'OOP\'s overview',
                'Classes and Objects',
                'Constructor and Destructor',
                'Function Overloading',
                'Encapsulation',
                'Inheritance',
                'Interface',
                'Polymorphism',
            ],
            'projects' => [
                'Data Visualization',
                'Game List App',
                'Friends List App',
                'Book Store App',
                'Gallery App',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+R02,+pertanyaan+saya&app_absent=0',
        ]);

        $classr0304 = ClassModel::create([
            'title' => 'Advanced Game Development',
            'level' => 'R-03 & R-04',
            'image' => 'AdvanceGameDevelopment.png',
            'meeting_info' => '40x @ 1 jam',
            'description' => 'Pemrograman real wold Game menggunakan advanced application Unity dan C#.',
            'concepts' => [
                'Game Engine',
                'Unity Environment',
                'Scripting',
                'Movement & Input',
                '2D Physics Concept',
                'Decision & Flow Control',
                'Game Objects',
                'Exception & Debugging',
                'Loops & Arrays',
            ],
            'projects' => [
                'Delivery Man',
                'Snow Boarder',
                'Quiz Master',
                'Laser Defender',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+R03,+pertanyaan+saya&app_absent=0',
        ]);

        $classw01 = ClassModel::create([
            'title' => 'Rapid Web Development',
            'level' => 'W-01',
            'image' => 'RapidWebDevelopment.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Mempelajari konsep dan pembuatan website dengan menggunakan framework yang mempermudah dan mempercepat proses pembuatan website.',
            'concepts' => [
                'Application Interface',
                'Layouts & Events',
                'Game Objects',
                'Game Elements',
                'Behaviors Logic',
                'Event Handling',
                'Manipulating Variables',
                'Layers',
            ],
            'projects' => [
                'Personal Web',
                'My Own Blog',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+W01,+pertanyaan+saya&app_absent=0',
        ]);

        $classw02 = ClassModel::create([
            'title' => 'Web Programming',
            'level' => 'W-02',
            'image' => 'WebProgramming.png',
            'meeting_info' => '20x @ 1 jam',
            'description' => 'Pemrograman website dasar menggunakan HTML, CSS, JQuery dan Framework untuk membuat website dengan tampilan menarik.',
            'concepts' => [
                'HTML',
                'CSS',
                'JavaScript',
                'JQuery',
                'Bootstrap',
            ],
            'projects' => [
                'Project Gallery Web',
                'Business Web',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+W02,+pertanyaan+saya&app_absent=0',
        ]);

        $classw0304 = ClassModel::create([
            'title' => 'Dynamic Web Programming',
            'level' => 'W-03 dan W-04',
            'image' => 'DynamicWebProgramming.png',
            'meeting_info' => '40x @ 1 jam',
            'description' => 'Pemrograman website dinamis tingkat lanjut dengan menggunakan database untuk fungsi website yang interaktif.',
            'concepts' => [
                'HTML',
                'JQuery',
                'Bootstrap CSS',
                'PHP',
                'Database SQL',
            ],
            'projects' => [
                'Guestbook',
                'Finance Application',
                'and more...',
            ],
            'button_link' => 'https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+tertarik+daftar+W03,+pertanyaan+saya&app_absent=0',
        ]);

        // Attach classes to courses
        $coursevc = Level::where('slug', 'vc')->first();
        $coursemmt = Level::where('slug', 'mmt')->first();
        $coursebbc = Level::where('slug', 'bbc')->first();
        $courserwc = Level::where('slug', 'rwc')->first();
        $coursevc->classes()->attach([$classb01->id, $classb02->id, $classb03->id]);
        $coursemmt->classes()->attach([$classm01->id, $classm02->id, $classm03->id]);
        $coursebbc->classes()->attach([$classb01->id, $classb02->id, $classb03->id, $classb04->id, $classb05->id]);
        $courserwc->classes()->attach([$classr01->id, $classr02->id, $classr0304->id, $classw01->id, $classw02->id, $classw0304->id]);
    }
}
