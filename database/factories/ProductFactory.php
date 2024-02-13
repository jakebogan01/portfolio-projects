<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
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
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'category_id' => Category::factory(),
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->paragraphs(6, true),
            'image' => 'https://picsum.photos/500.jpg',
            'images' => [
                'https://picsum.photos/500.jpg',
                'https://picsum.photos/500.jpg',
                'https://picsum.photos/500.jpg',
            ],
            'price' => fake()->randomFloat('2', 0, 500)
        ];
    }
}
