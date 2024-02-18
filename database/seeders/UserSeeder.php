<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'project_id' => 1,
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('test1234'),
        ]);
    }
}
