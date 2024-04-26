<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the default state of the model.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(5),
            'author_id' => factory(App\Models\User::class),
            'published_at' => now(),
        ];
    }

    /**
     * Create a featured post.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function featured()
    {
        return $this->state([
            'featured' => true,
        ]);
    }

    /**
     * Create a post published after a specific date.
     *
     * @param string $date
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function publishedAfter($date)
    {
        return $this->state([
            'published_at' => $this->faker->dateAfter($date),
        ]);
    }
}
