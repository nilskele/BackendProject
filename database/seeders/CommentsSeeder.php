<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        // For Newsletter 1
        Comment::create([
            'user_id' => 1,
            'newsletter_id' => 1,
            'content' => 'Great newsletter, really informative!'
        ]);
        
        Comment::create([
            'user_id' => 2,
            'newsletter_id' => 1,
            'content' => 'I loved the tips on new electronics, thanks!'
        ]);

        // For Newsletter 2
        Comment::create([
            'user_id' => 3,
            'newsletter_id' => 2,
            'content' => 'This month\'s edition is fantastic. Keep it up!'
        ]);

        Comment::create([
            'user_id' => 4,
            'newsletter_id' => 2,
            'content' => 'Very interesting articles, especially about the new tech gadgets!'
        ]);

        // For Newsletter 3
        Comment::create([
            'user_id' => 5,
            'newsletter_id' => 3,
            'content' => 'I always look forward to the monthly edition!'
        ]);

        Comment::create([
            'user_id' => 6,
            'newsletter_id' => 3,
            'content' => 'The content in this issue was top-notch, as always.'
        ]);

        // For Newsletter 4
        Comment::create([
            'user_id' => 7,
            'newsletter_id' => 4,
            'content' => 'Love the special edition format, can\'t wait for more!'
        ]);

        Comment::create([
            'user_id' => 8,
            'newsletter_id' => 4,
            'content' => 'The new product releases you covered were very helpful!'
        ]);

        // For Newsletter 5
        Comment::create([
            'user_id' => 9,
            'newsletter_id' => 5,
            'content' => 'Looking forward to seeing more promotions like this!'
        ]);

        Comment::create([
            'user_id' => 10,
            'newsletter_id' => 5,
            'content' => 'Thanks for the updates, I\'m really excited for the upcoming deals!'
        ]);

        // For Newsletter 6
        Comment::create([
            'user_id' => 1,
            'newsletter_id' => 6,
            'content' => 'This was a great edition, very informative about the sales!'
        ]);

        Comment::create([
            'user_id' => 2,
            'newsletter_id' => 6,
            'content' => 'I found the discount codes really useful, thanks!'
        ]);
        
        // For Newsletter 7
        Comment::create([
            'user_id' => 3,
            'newsletter_id' => 7,
            'content' => 'Amazing deals, I can\'t wait to use them.'
        ]);

        Comment::create([
            'user_id' => 4,
            'newsletter_id' => 7,
            'content' => 'Loved the new arrivals segment. I\'m going to grab a few things!'
        ]);

        // For Newsletter 8
        Comment::create([
            'user_id' => 5,
            'newsletter_id' => 8,
            'content' => 'Great newsletter, I love the sneak peek of upcoming products!'
        ]);

        Comment::create([
            'user_id' => 6,
            'newsletter_id' => 8,
            'content' => 'The new arrivals are so exciting! Keep up the good work.'
        ]);

        // For Newsletter 9
        Comment::create([
            'user_id' => 7,
            'newsletter_id' => 9,
            'content' => 'Such valuable content, looking forward to the next edition.'
        ]);

        Comment::create([
            'user_id' => 8,
            'newsletter_id' => 9,
            'content' => 'The tips in this issue are great, thanks for sharing!'
        ]);

        // For Newsletter 10
        Comment::create([
            'user_id' => 9,
            'newsletter_id' => 10,
            'content' => 'I love receiving these newsletters, they\'re always so helpful!'
        ]);

        Comment::create([
            'user_id' => 10,
            'newsletter_id' => 10,
            'content' => 'Great content, and very well written!'
        ]);
    }
}
