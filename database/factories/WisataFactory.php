<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wisata>
 */
class WisataFactory extends Factory
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
            'no_pengelola' => fake()->phoneNumber(),
            'harga' => fake()->numberBetween(10000, 100000),
            'user_id' => mt_rand(1, 5),
            'city_id' => mt_rand(1, 4),
            'published_at' => now(),
        ];
    }
}
