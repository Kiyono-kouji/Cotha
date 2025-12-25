<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Coding Workshop for Kids',
            'image' => 'https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=600&q=80',
            'category' => 'workshop',
            'date' => now()->addDays(5),
            'location' => 'COTHA Center',
            'price' => 'Free',
        ]);
        Event::create([
            'title' => 'Online Python Competition',
            'image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=600&q=80',
            'category' => 'competition',
            'date' => now()->addDays(10),
            'location' => 'Zoom',
            'price' => 'Rp 50.000',
        ]);
        Event::create([
            'title' => 'Tech Seminar: AI for Beginners',
            'image' => 'https://images.unsplash.com/photo-1503676382389-4809596d5290?auto=format&fit=crop&w=600&q=80',
            'category' => 'seminar',
            'date' => now()->addDays(15),
            'location' => 'COTHA Center',
            'price' => 'Rp 25.000',
        ]);
        Event::create([
            'title' => 'Offline Coding Meetup',
            'image' => 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80',
            'category' => 'offline',
            'date' => now()->addDays(20),
            'location' => 'COTHA Center',
            'price' => 'Free',
        ]);
        Event::create([
            'title' => 'Online Web Development Bootcamp',
            'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80',
            'category' => 'online',
            'date' => now()->addDays(25),
            'location' => 'Zoom',
            'price' => 'Rp 100.000',
        ]);
    }
}
