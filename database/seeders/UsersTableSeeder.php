<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Запуск генерации тестовых данных.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker::class);

        // Создать 20 пользователей
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'role' => $faker->randomElement(['user', 'admin']),
                // Добавьте другие атрибуты пользователя по мере необходимости
            ]);
        }
    }
}
