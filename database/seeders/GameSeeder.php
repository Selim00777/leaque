<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker::class);

        // Create 20 games
        for ($i = 0; $i < 20; $i++) {
            $game = Game::create([
                'home_team_id' => factory(Team::class)->id,
                'away_team_id' => factory(Team::class)->id,
                'date' => $faker->dateBetween('-1 year', 'now'),
                'time' => $faker->time,
                'location' => $faker->city,
                'status' => $faker->randomElement(['scheduled', 'in_progress', 'completed']),
                // Add other game attributes as needed
            ]);

            // Generate scores for the game
            $this->generateScores($game);
        }
    }

    private function generateScores($game)
    {
        $homeScore = $faker->randomElement([0, 1, 2, 3, 4]);
        $awayScore = $faker->randomElement([0, 1, 2, 3, 4]);

        Score::create([
            'game_id' => $game->id,
            'home_team_score' => $homeScore,
            'away_team_score' => $awayScore,
        ]);
    }
}
