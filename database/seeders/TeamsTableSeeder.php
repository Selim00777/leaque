<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Team; // Import the Team model

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the 'teams' table before seedingphp ar
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('teams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');



        // Team data in an array (replace with your actual data)
        $teamData = [
            [
                'name' => 'Team 1',
                'city' => 'City 1',
                'sport_id' => 1, // Assuming 'league_id' exists
            ],
            [
                'name' => 'Team 2',
                'city' => 'City 2',
                'sport_id' => 2,
            ],
            // Add more team data entries as needed
        ];

        // Process and insert team data into the database
        foreach ($teamData as $teamDataEntry) {
            $team = new Team();
            $team->fill($teamDataEntry); // Use Eloquent's fill method to set attributes
            $team->save();
        }
    }
}
