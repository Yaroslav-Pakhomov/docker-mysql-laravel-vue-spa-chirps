<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\MessageBoard;
use Illuminate\Database\Seeder;

class MessageBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MessageBoard::factory(50)->create();
    }
}
