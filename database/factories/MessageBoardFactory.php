<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\MessageBoard;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MessageBoard>
 */
class MessageBoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(random_int(25, 30)),
            'slug' => fake()->unique()->slug(3, FALSE),
            'content' => fake()->realText(random_int(50, 200)),

            'user_id' => random_int(2, 11),

            'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
        ];
    }
}
