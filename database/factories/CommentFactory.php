<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => fake()->sentence($nbWords = 4, $variableNbWords = true), //variable 4 word comment
            'user_id' => fake()->numberBetween(1, 10),
            'post_id' => fake()->numberBetween(1, 16),
        ];
    }
}
