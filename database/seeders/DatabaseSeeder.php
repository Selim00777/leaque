<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed users
        $this->call(UserFactory::class); // Use UserFactory::class

        // Seed categories
        $this->call(CategoryFactory::class);

        // Seed posts with comments
        $this->call([
            PostFactory::class,
            CommentFactory::class,
        ]);
    }
}
