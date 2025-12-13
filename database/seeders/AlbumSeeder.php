<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            [
                'title' => 'Game Project Presentation',
                'description' => 'Game Project Presentation by Cotha Students',
                'created_at' => now(),
                'updated_at' => now(),
                'youtube' => 'RpoRv11aoCs',
            ],
            [
                'title' => 'Game Coding with Cotha',
                'description' => 'Game Coding with Cotha at SD IPH East',
                'created_at' => now(),
                'updated_at' => now(),
                'youtube' => 'swzPRQ2fP1c',
            ],
        ];

        foreach ($albums as $albumData) {
            $youtube = $albumData['youtube'];
            unset($albumData['youtube']);
            $album = Album::create($albumData);

            $album->media()->create([
                'type' => 'youtube',
                'file' => $youtube,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
