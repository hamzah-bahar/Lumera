<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Hamzah Bahar',
            'email' => 'hamzah.br9@gmail.com',
            'username' => 'hamzah-bahar',
            'role' => 'admin'
        ]);

        $categories = [
            'Technology',
            'Health',
            'Science',
            'Sport',
            'Politics',
            'Entertainment'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => \Illuminate\Support\Str::slug($category)
            ]);
        }

        Post::factory(100)->create();
    }
}
