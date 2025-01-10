<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class NewslettersSeeder extends Seeder
{
    public function run()
    {
        Newsletter::create([
            'title' => 'Weekly Newsletter 1',
            'content' => 'Here is this week\'s content...',
            
            'image' => 'images/liquidationimg.jpg'
        ]);

        Newsletter::create([
            'title' => 'Weekly Newsletter 2',
            'content' => 'This week we have more news for you...',

            'image' => 'images/liquidationimg1.jpg'
        ]);

        Newsletter::create([
            'title' => 'Monthly Newsletter 1',
            'content' => 'Our monthly updates...',

            'image' => 'images/liquidationimg2.jpg'
        ]);

        Newsletter::create([
            'title' => 'Monthly Newsletter 2',
            'content' => 'Another great month with updates...',

            'image' => 'images/liquidationimg3.jpg'
        ]);

        Newsletter::create([
            'title' => 'Special Edition Newsletter 1',
            'content' => 'Check out our special offers...',

            'image' => 'images/liquidationimg4.jpg'
        ]);

        Newsletter::create([
            'title' => 'Special Edition Newsletter 2',
            'content' => 'Exciting news and promotions...',

            'image' => 'images/liquidationimg5.jpg'
        ]);

        Newsletter::create([
            'title' => 'Weekly Newsletter 3',
            'content' => 'Our weekly roundup...',
            'image' => 'images/liquidationimg2.jpg'
        ]);

        Newsletter::create([
            'title' => 'Weekly Newsletter 4',
            'content' => 'Stay tuned for more exciting content...',

            'image' => 'images/liquidationimg2.jpg'
        ]);

        Newsletter::create([
            'title' => 'Monthly Newsletter 3',
            'content' => 'Our latest product updates...',

            'image' => 'images/liquidationimg2.jpg'
        ]);

        Newsletter::create([
            'title' => 'Monthly Newsletter 4',
            'content' => 'All the news you need to know this month...',

            'image' => 'images/liquidationimg2.jpg'
        ]);
    }
}
