<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->create([
            'name' => 'Epick',
        ])->products()->createMany(
            Product::factory()->count(30)->make()->toArray()
        );

        Project::factory()->create([
            'name' => 'Project 2',
        ])->products()->createMany(
            Product::factory()->count(30)->make()->toArray()
        );

        // Update products with project_id of 1 to have null size where category_id is 4
        Product::where('project_id', 1)
            ->where('category_id', 4)
            ->update(['size' => null]);

        // Update products with project_id of 1 to have null gender and age where category_id is 1 or 4
        Product::where('project_id', 1)
            ->whereIn('category_id', [1, 4])
            ->update(['gender' => null, 'age' => null]);

        // Update products with project_id of 1 to have null style where category_id is 1, 2 or 4
        Product::where('project_id', 1)
            ->whereIn('category_id', [1, 2, 4])
            ->update(['style' => null]);

        // Update products with project_id of 1 to have null shape where category_id is 1, 2 or 3
        Product::where('project_id', 1)
            ->whereIn('category_id', [1, 2, 3])
            ->update(['shape' => null]);
    }
}
