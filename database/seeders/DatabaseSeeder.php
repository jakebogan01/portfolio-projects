<?php

namespace Database\Seeders;

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
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }

        Product::factory(30)->create();
    }
}
