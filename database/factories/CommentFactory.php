<?php

namespace Database\Factories;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Comment;
use App\Models\User; // Example: Assuming Comment has a user_id relationship
use App\Models\Game; // Example: Assuming Comment can be about a Game
use App\Models\Player; // Example: Assuming Comment can be about a Player
use App\Models\Team; // Example: Assuming Comment can be about a Team

class CommentFactory extends Seeder
{
    /**
     * Define the model for the factory.
     *
     * @return string
     */
    public function model()
    {
        return Comment::class;
    }

    /**
     * Define the factory's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => factory(User::class)->create()->id, // Example: Assuming Comment has a user_id relationship
            'commentable_type' => 'Game', // Example: Assuming Comment can be about a Game
            'commentable_id' => factory(Game::class)->create()->id, // Example: Assuming Comment can be about a Game
            'content' => $this->faker->paragraph,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Configure the factory.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function configure($model)
    {
        //
    }
}
