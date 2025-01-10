<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        try {
            Category::create(['name' => 'General Inquiries']);
            echo "Category 'General Inquiries' created.\n";
    
            Category::create(['name' => 'Products']);
            echo "Category 'Products' created.\n";
    
            Category::create(['name' => 'Orders']);
            echo "Category 'Orders' created.\n";
    
            Category::create(['name' => 'Support']);
            echo "Category 'Support' created.\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}

