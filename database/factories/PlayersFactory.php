<?php

namespace App\Database\Factories;

use App\Models\Player;
use App\Models\Team;
use Faker\Generator as Faker;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's definition.
     *
     * @var string
     */
    protected $name = 'Player';

    /**
     * Define the default attributes of the model.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'team_id' => factory(Team::class)->id,
            'position' => $this->faker->randomElement(['Forward', 'Midfielder', 'Defender']),
            // Add other player attributes as needed
        ];
    }

    // Add custom factory methods for specific types of players as needed
}
