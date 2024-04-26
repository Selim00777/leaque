<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Generator as Faker;

class CategoryFactory extends Factory
{
    /**
     * Define the model for the factory.
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * Define the default state of the model.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }

    /**
     * Create a category for a specific sport.
     *
     * @param string $sport
     * @return array
     */
    public function forSport($sport)
    {
        return $this->state([
            'name' => $this->faker->word($sport),
            'description' => $this->faker->sentence($sport),
        ])->create();
    }
}
