<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed a few comments (adjust the number as needed)
        for ($i = 0; $i < 20; $i++) {
            DB::table('comments')->insert([
                'user_id' => rand(1, 10), // Assuming you have users with IDs 1-10
                'commentable_id' => rand(1, 50), // Assuming you have commentables with IDs 1-50
                'commentable_type' => 'App\Models\Post', // Replace with the actual model class for commentables
                'body' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
