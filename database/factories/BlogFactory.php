<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(1),
            'body'=> '<p>'. implode('<p></p>',fake()->paragraphs(mt_rand(10, 30))) . '</p>',
            'user_id' => mt_rand(1, 5),
            'published_at' => now(),
        ];
    }
}
