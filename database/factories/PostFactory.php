<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            '/images/courseone.png',
            '/images/coursetwo.png',
            '/images/coursethree.png',
        ];

        $title = fake()->sentence();
        return [
            'image' => $images[array_rand($images)],
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'content' => fake()->realText(1500),
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => 1,
            'published_at' => fake()->optional()->dateTime()

        ];
    }
}
