<?php

namespace Database\Seeders;

use App\Models\User;
use CreatePostPostCategoryTable;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            AdminSeeder::class, // Add this line
            PostCategorySeeder::class, // Add this line
            UsersSeeder::class,
            NewslettersSeeder::class,
            PostsSeeder::class,
            CommentsSeeder::class,
            ContactMessagesSeeder::class,
            CategoriesSeeder::class,
            QuestionsSeeder::class,
            PostPostCategorySeeder::class,
        ]);
        
    }
}
