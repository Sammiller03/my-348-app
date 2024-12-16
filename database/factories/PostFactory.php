<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence($nbWords = 2, $variableNbWords = false), //two word title
            'content' => fake()->paragraph($nb_sentences = 3, $variable_nb_sentences = true), //variable 3 sentence paragraphs
            'user_id' => fake()->numberBetween(1, 10), //give a random user a post
        ];
    }
}
