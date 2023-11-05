<?php

namespace Database\Seeders;

use App\Models\ExampleBlog\Blog;
use App\Models\ExampleBlog\BlogCategory;
use App\Models\ExampleBlog\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExampleBlogSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag_data = [
            [
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Node JS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Python',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Java',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'React',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        $category_data = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel'
            ],
            [
                'name' => 'React',
                'slug' => 'react'
            ],
            [
                'name' => 'Node JS',
                'slug' => 'node-js'
            ],
        ];
        Tag::insert($tag_data);
        BlogCategory::insert($category_data);
        $blogs = Blog::factory(1000)->create();
        $tags = Tag::all();
        $blogs->each(function ($blog) use ($tags) {
            $blog->blogTags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

    }
}
