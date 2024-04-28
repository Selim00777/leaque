<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed some sample scores for games
        DB::table('scores')->insert([
            [
                'game_id' => 1, // Replace with actual game IDs
                'team1_score' => 2,
                'team2_score' => 1,
            ],
            [
                'game_id' => 2,
                'team1_score' => 3,
                'team2_score' => 0,
            ],
            // Add more score records as needed
        ]);
    }
}
