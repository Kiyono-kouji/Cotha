<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventCategory;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $competitive = EventCategory::where('name', 'Competitive Programming')->first();
        $workshop = EventCategory::where('name', 'Game Development')->first();
        $computational = EventCategory::where('name', 'Computational Thinking')->first();

        Event::create([
            'event_category_id' => $workshop->id,
            'title' => 'Coding Workshop for Kids',
            'description' => 'An interactive workshop to introduce kids to the world of coding through fun games and activities.',
            'image' => 'workshop.jpg',
            'registration_type' => 'individual',
            'max_team_members' => null,
            'price_per_team' => 0,
            'date' => now()->addDays(5),
            'last_registration_at' => now()->addDays(-1),
            'location' => 'COTHA Center',
            'result' => null,
        ]);

        Event::create([
            'event_category_id' => $competitive->id,
            'title' => 'Online Python Competition',
            'description' => 'Compete with other students in solving algorithmic challenges using Python programming.',
            'image' => 'python-comp.jpg',
            'registration_type' => 'team',
            'max_team_members' => 3,
            'price_per_team' => 50000,
            'date' => now()->addDays(10),
            'last_registration_at' => now()->addDays(9),
            'location' => 'Zoom',
            'result' => null,
        ]);

        Event::create([
            'event_category_id' => $computational->id,
            'title' => 'Scratch Game Building Contest',
            'description' => 'Build creative games using Scratch and showcase your computational thinking skills.',
            'image' => 'scratch-contest.jpg',
            'registration_type' => 'individual',
            'max_team_members' => null,
            'price_per_team' => 25000,
            'date' => now()->addDays(15),
            'location' => 'COTHA Center',
            'result' => null,
        ]);

        Event::create([
            'event_category_id' => $workshop->id,
            'title' => 'Unity Game Dev Bootcamp',
            'description' => 'A comprehensive bootcamp covering Unity game development from basics to advanced topics.',
            'image' => 'unity-bootcamp.jpg',
            'registration_type' => 'individual',
            'max_team_members' => null,
            'price_per_team' => 150000,
            'date' => now()->addDays(20),
            'location' => 'Online',
            'result' => null,
        ]);

        Event::create([
            'event_category_id' => $competitive->id,
            'title' => 'Web Dev Hackathon',
            'description' => 'Build a complete web application in 48 hours with your team. Best project wins prizes!',
            'image' => 'hackathon.jpg',
            'registration_type' => 'team',
            'max_team_members' => 4,
            'price_per_team' => 100000,
            'date' => now()->addDays(25),
            'location' => 'Hybrid (Online & Offline)',
            'result' => null,
        ]);
    }
}
