<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('games')->insert([
			'name' => 'TESIII Morrowind',
		]);

		DB::table('games')->insert([
			'name' => 'TESIV Oblivion',
		]);

		DB::table('games')->insert([
			'name' => 'TESV Skyrim LE',
		]);

		DB::table('games')->insert([
			'name' => 'TESV Skyrim SE',
		]);

		DB::table('games')->insert([
			'name' => 'TESV Skyrim VR',
		]);

		DB::table('games')->insert([
			'name' => 'Fallout 3',
		]);

		DB::table('games')->insert([
			'name' => 'Fallout New Vegas',
		]);

		DB::table('games')->insert([
			'name' => 'Fallout 4',
		]);

		DB::table('games')->insert([
			'name' => 'Fallout 4 VR',
		]);

		DB::table('games')->insert([
			'name' => 'Tale of Two Wastelands',
		]);
    }
}