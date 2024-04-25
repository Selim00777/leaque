<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create test users
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create test teams
        $team1 = Team::create([
            'name' => 'Team A',
            'city' => 'New York',
        ]);

        $team2 = Team::create([
            'name' => 'Team B',
            'city' => 'London',
        ]);

        // Create test players
        $player1 = Player::create([
            'name' => 'Peter Jones',
            'team_id' => $team1->id,
            'position' => 'Striker',
        ]);

        $player2 = Player::create([
            'name' => 'Mary Smith',
            'team_id' => $team2->id,
            'position' => 'Midfielder',
        ]);

        // Create test games
        $game1 = Game::create([
            'name' => 'Championship Match',
            'date' => '2024-04-25',
            'start_time' => '18:00:00',
            'end_time' => '20:00:00',
            'team_a_id' => $team1->id,
            'team_b_id' => $team2->id,
        ]);

        $game2 = Game::create([
            'name' => 'Friendly Match',
            'date' => '2024-04-27',
            'start_time' => '15:00:00',
            'end_time' => '17:00:00',
            'team_a_id' => $team1->id,
            'team_b_id' => $team2->id,
        ]);

        // Create test comments
        $comment1 = Comment::create([
            'name' => 'John Doe',
            'content' => 'Great game! Team A played well.',
            'game_id' => $game1->id,
            'user_id' => $user1->id,
        ]);

        $comment2 = Comment::create([
            'name' => 'Jane Doe',
            'content' => 'Exciting match! I enjoyed watching.',
            'game_id' => $game2->id,
            'user_id' => $user2->id,
        ]);
    }
}
