<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
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
            'project_id' => random_int(1, 2),
            'category_id' => random_int(1, 4),
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->paragraphs(6, true),
            'image' => 'https://picsum.photos/500.jpg',
            'images' => [
                'https://picsum.photos/500.jpg',
                'https://picsum.photos/500.jpg',
                'https://picsum.photos/500.jpg',
            ],
            'price' => fake()->randomFloat('2', 0, 500),
            'color' => fake()->colorName(),
            'size' => fake()->randomElement(['S', 'M', 'L', 'XL']),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'age' => fake()->randomElement(['Adult', 'Child', 'Infant']),
            'style' => fake()->randomElement(['Boots', 'Slippers', 'Flats', 'Sneakers']),
            'brand' => fake()->company(),
            'shape' => fake()->randomElement(['Round', 'Square', 'Oval', 'Rectangle']),
            'rating' => fake()->randomFloat('1', 1, 5),
        ];
    }
}
