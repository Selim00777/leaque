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
        // Заполнение пользователей
        $this->call(UserFactory::class); // Используйте UserFactory::class

        // Заполнение категорий
        $this->call(CategoryFactory::class);

        // Заполнение постов с комментариями
        $this->call([
            PostFactory::class,
            CommentFactory::class,
        ]);
    }
}
