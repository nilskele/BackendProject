<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Electronics',
            'Furniture',
            'Books',
            'Clothing',
            'Toys',
            'Appliances',
            'Vehicles',
            'Art',
            'Jewelry',
            'Sports Equipment'
        ];

        foreach ($categories as $category) {
            PostCategory::create(['name' => $category]);
        }
    }
}

