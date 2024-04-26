<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use App\Models\User; // Replace with your model's namespace

class UserFactory extends Factory
{
    /**
     * The name of the factory's definition.
     *
     * @return string
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('secret'), // Replace with your desired password hashing method
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];
    }
}
