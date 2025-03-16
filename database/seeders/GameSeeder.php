<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            'id' => 1,
            'name' => 'TESIII Morrowind',
            'slug' => 'tes3-morrowind',
        ]);

        DB::table('games')->insert([
            'id' => 2,
            'name' => 'TESIV Oblivion',
            'slug' => 'tes4-oblivion',
        ]);

        DB::table('games')->insert([
            'id' => 3,
            'name' => 'TESV Skyrim LE',
            'slug' => 'tes5-skyrim-le',
        ]);

        DB::table('games')->insert([
            'id' => 4,
            'name' => 'TESV Skyrim SE',
            'slug' => 'tes5-skyrim-se',
        ]);

        DB::table('games')->insert([
            'id' => 5,
            'name' => 'TESV Skyrim VR',
            'slug' => 'tes5-skyrim-vr',
        ]);

        DB::table('games')->insert([
            'id' => 6,
            'name' => 'Fallout 3',
            'slug' => 'fallout-3',
        ]);

        DB::table('games')->insert([
            'id' => 7,
            'name' => 'Fallout New Vegas',
            'slug' => 'fallout-new-vegas',
        ]);

        DB::table('games')->insert([
            'id' => 8,
            'name' => 'Fallout 4',
            'slug' => 'fallout4',
        ]);

        DB::table('games')->insert([
            'id' => 9,
            'name' => 'Fallout 4 VR',
            'slug' => 'fallout4-vr',
        ]);

        DB::table('games')->insert([
            'id' => 10,
            'name' => 'Tale of Two Wastelands',
            'slug' => 'tale-of-two-wastelands',
        ]);

        DB::table('games')->insert([
            'id' => 11,
            'name' => 'Cyberpunk 2077',
            'slug' => 'cyberpunk-2077',
        ]);

        DB::table('games')->insert([
            'id' => 12,
            'name' => 'Darkest Dungeon',
            'slug' => 'darkest-dungeon',
        ]);

        DB::table('games')->insert([
            'id' => 13,
            'name' => 'Dark Messiah of Might & Magic',
            'slug' => 'dark-messiah-of-might-magic',
        ]);

        DB::table('games')->insert([
            'id' => 14,
            'name' => 'Dark Souls',
            'slug' => 'dark-souls',
        ]);

        DB::table('games')->insert([
            'id' => 15,
            'name' => 'Dragon Age II',
            'slug' => 'dragon-age-ii',
        ]);

        DB::table('games')->insert([
            'id' => 16,
            'name' => 'Dragon Age: Origins',
            'slug' => 'dragon-age-origins',
        ]);

        DB::table('games')->insert([
            'id' => 17,
            'name' => 'Dungeon Siege II',
            'slug' => 'dungeon-siege-ii',
        ]);

        DB::table('games')->insert([
            'id' => 18,
            'name' => 'Kerbal Space Program',
            'slug' => 'kerbal-space-program',
        ]);

        DB::table('games')->insert([
            'id' => 19,
            'name' => 'Kingdom Come: Deliverance',
            'slug' => 'kingdom-come-deliverance',
        ]);

        DB::table('games')->insert([
            'id' => 20,
            'name' => 'Mirror\'s Edge',
            'slug' => 'mirrors-edge',
        ]);

        DB::table('games')->insert([
            'id' => 21,
            'name' => 'Mount & Blade II: Bannerlord',
            'slug' => 'mount-blade-ii-bannerlord',
        ]);

        DB::table('games')->insert([
            'id' => 22,
            'name' => 'No Man\'s Sky',
            'slug' => 'no-mans-sky',
        ]);

        DB::table('games')->insert([
            'id' => 23,
            'name' => 'STALKER Anomaly',
            'slug' => 'stalker-anomaly',
        ]);

        DB::table('games')->insert([
            'id' => 24,
            'name' => 'Stardew Valley',
            'slug' => 'stardew-valley',
        ]);

        DB::table('games')->insert([
            'id' => 25,
            'name' => 'The Binding of Isaac: Rebirth',
            'slug' => 'the-binding-of-isaac-rebirth',
        ]);

        DB::table('games')->insert([
            'id' => 26,
            'name' => 'The Witcher 3: Wild Hunt',
            'slug' => 'the-witcher-3-wild-hunt',
        ]);

        DB::table('games')->insert([
            'id' => 27,
            'name' => 'Zeus and Poseidon',
            'slug' => 'zeus-and-poseidon',
        ]);

        DB::table('games')->insert([
            'id' => 28,
            'name' => 'Enderal',
            'slug' => 'enderal',
        ]);

        DB::table('games')->insert([
            'id' => 29,
            'name' => 'Enderal SE',
            'slug' => 'enderal-se',
        ]);

        DB::table('games')->insert([
            'id' => 30,
            'name' => 'Starfield',
            'slug' => 'starfield',
        ]);

        DB::table('games')->insert([
            'id' => 31,
            'name' => 'The Witcher: Enhanced Edition',
            'slug' => 'the-witcher-enhanced-edition',
        ]);

        DB::table('games')->insert([
            'id' => 32,
            'name' => 'Baldur\'s Gate 3',
            'slug' => 'baldurs-gate-3',
        ]);
    }
}
