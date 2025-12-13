<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::insert([
            [
                'name' => 'ELYON PRIMARY CHRISTIAN SCHOOL SURABAYA',
                'logo' => 'Partners/elyon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IPH PRIMARY SCHOLL EAST SURABAYA',
                'logo' => 'Partners/iphpe.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IPH SECONDARY SCHOLL EAST SURABAYA',
                'logo' => 'Partners/iphse.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IPH SECONDARY SCHOOL WEST SURABAYA',
                'logo' => 'Partners/iphsw.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SD PETRA 1 SURABAYA',
                'logo' => 'Partners/sp1s.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SD PETRA 5 SURABAYA',
                'logo' => 'Partners/sp5s.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SD PETRA 7 SURABAYA',
                'logo' => 'Partners/sp7s.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SD PETRA 9 SURABAYA',
                'logo' => 'partners/sp9s.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SD PETRA 10 SURABAYA',
                'logo' => 'Partners/sp10s.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SD PETRA 12 SIDOARJO',
                'logo' => 'partners/sp12s.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SD PETRA 13 SIDOARJO',
                'logo' => 'partners/sp13s.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
