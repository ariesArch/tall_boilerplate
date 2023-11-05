<?php

namespace Database\Factories\ExampleBlog;

use App\Models\ExampleBlog\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = BlogCategory::pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'blog_category_id' => $this->faker->randomElement($categoryIds), // Assign a random category ID
        ];
    }
}
