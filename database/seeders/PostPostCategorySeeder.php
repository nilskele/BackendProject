<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\DB;

class PostPostCategorySeeder extends Seeder
{
    public function run()
    {
        $posts = Post::all();
        $categories = PostCategory::all();

        foreach ($posts as $post) {
            // Randomly assign between 1 to 3 categories to each post
            $randomCategories = $categories->random(rand(1, 3));

            foreach ($randomCategories as $category) {
                DB::table('post_post_category')->insert([
                    'post_id' => $post->id,
                    'post_category_id' => $category->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
