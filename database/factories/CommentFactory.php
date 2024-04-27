<?php

namespace App\Database\Factories;

use App\Models\Comment;
use App\Models\Game;
use App\Models\User;
use Faker\Generator as Faker;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's definition.
     *
     * @var string
     */
    protected $name = 'Comment';

    /**
     * Define the default attributes of the model.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph,
            'user_id' => factory(User::class)->id,
            'commentable_type' => 'App\Models\Game', // Assuming comments are for games
            'commentable_id' => factory(Game::class)->id,
            // Add other comment attributes as needed
        ];
    }

    // Add custom factory methods for specific types of comments as needed
}
