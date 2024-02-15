<?php

namespace Database\Seeders;

use Str;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Electronics', 'Clothes', 'Shoes', 'Furniture'];

        foreach ($categories as $category) {
            Category::factory()->create([
                'project_id' => 1,
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
