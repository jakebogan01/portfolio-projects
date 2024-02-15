<?php

namespace Database\Seeders;

use App\Models\Project;
use Str;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = ['Electronics', 'Clothes', 'Shoes', 'Furniture'];

        User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('test1234'),
        ]);

        foreach ($categories as $category) {
            Category::factory()->create([
                'project_id' => 1,
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }

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

        // if any products has a category_id of 4 make size null
        Product::where('category_id', 4)->update(['size' => null]);
    }
}
