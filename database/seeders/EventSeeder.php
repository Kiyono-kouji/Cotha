<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Clear old sample data
        Event::query()->delete();

        $events = [
            [
                'title' => 'Robotics Workshop for Beginners',
                'image' => 'https://picsum.photos/seed/workshop/800/450',
                'category' => 'workshop',
                'date' => now()->addDays(7),
                'location' => 'Dhaka',
                'price' => 'Free',
            ],
            [
                'title' => 'Online Coding Seminar',
                'image' => 'https://picsum.photos/seed/seminar/800/450',
                'category' => 'seminar',
                'date' => now()->addDays(10),
                'location' => 'Online',
                'price' => '$10',
            ],
            [
                'title' => 'Math Competition 2025',
                'image' => 'https://picsum.photos/seed/competition/800/450',
                'category' => 'competition',
                'date' => now()->addDays(20),
                'location' => 'Chittagong',
                'price' => '$5',
            ],
            [
                'title' => 'Community Meetup (Offline)',
                'image' => 'https://picsum.photos/seed/offline/800/450',
                'category' => 'offline',
                'date' => now()->addDays(15),
                'location' => 'Sylhet',
                'price' => 'Free',
            ],
            [
                'title' => 'Live Webinar: Study Skills',
                'image' => 'https://picsum.photos/seed/online/800/450',
                'category' => 'online',
                'date' => now()->addDays(3),
                'location' => 'Online',
                'price' => 'Free',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
