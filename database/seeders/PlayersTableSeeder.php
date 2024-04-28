<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed some sample players
        DB::table('players')->insert([
            [
                'team_id' => 1, // Replace with actual team IDs
                'name' => 'John Doe',
                'position' => 'Striker',
                'number' => 9,
            ],
            [
                'team_id' => 1,
                'name' => 'Jane Smith',
                'position' => 'Midfielder',
                'number' => 10,
            ],
            // Add more player records as needed
        ]);
    }
}
