<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Game;
use App\Models\Score;
use App\Models\Player;
use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            TeamsTableSeeder::class,
            GamesTableSeeder::class,
            ScoresTableSeeder::class,
            PlayersTableSeeder::class,
            CommentsTableSeeder::class,
        ]);
    }
}
