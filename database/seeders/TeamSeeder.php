<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker::class);

        // Create 10 teams
        for ($i = 0; $i < 10; $i++) {
            Team::create([
                'name' => $faker->unique()->teamName,
                'city' => $faker->city,
                'conference' => $faker->randomElement(['Eastern', 'Western']),
                'division' => $faker->randomElement(['Atlantic', 'Central', 'Southeast', 'Pacific', 'Northwest']),
                // Add other team attributes as needed
            ]);
        }
    }
}
