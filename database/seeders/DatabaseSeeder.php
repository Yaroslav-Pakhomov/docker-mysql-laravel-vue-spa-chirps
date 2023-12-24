<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
        ]);

        User::factory(10)->create();
        $this->command->info('Таблица с пользователями загружена данными!');

        $this->call(MessageBoardSeeder::class);
        $this->command->info('Таблица с объявлениями загружена данными!');
    }
}
