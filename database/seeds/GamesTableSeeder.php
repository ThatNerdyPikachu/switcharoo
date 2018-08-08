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
        \DB::table("games")->insert([
        	"name" => "Super Mario Odyssey",
        	"description" => "Join Mario as he travels across the world to save Peach from Bowser!"
        ], [
        	"name" => "ARMS",
        	"description" => "fight or something idk"
        ], [
        	"name" => "/dev/null",
        	"description": "superwhiskers' personal hell"
        ]);
    }
}
