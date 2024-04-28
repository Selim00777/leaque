<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for games table
        $games = [
            [
                'date' => '2024-04-20',
                'location' => 'Mary, Mary, Turkmenistan',
                'score' => 1,
                'sport_id' => 1, // Replace with actual sport ID
                'team1_id' => 1, // Replace with actual team ID
                'team2_id' => 2, // Replace with actual team ID
                'time' => '14:00:00',
            ],
            [
                'date' => '2024-04-25',
                'location' => 'Ashgabat, Turkmenistan',
                'score' => 2,
                'sport_id' => 2, // Replace with actual sport ID
                'team1_id' => 3, // Replace with actual team ID
                'team2_id' => 4, // Replace with actual team ID
                'time' => '18:30:00',
            ],
            // Add more game data as needed
        ];

        // Insert data into games table
        DB::table('games')->insert($games);
    }
}
