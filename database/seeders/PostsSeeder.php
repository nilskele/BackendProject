<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

class PostsSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $this->createPostsForUser($user);
        }
    }

    private function createPostsForUser($user)
    {
        $presentDate = Carbon::now();
        $pastDates = [
            $presentDate->copy()->subYears(3),
            $presentDate->copy()->subMonths(18),
            $presentDate->copy()->subMonths(6),
        ];
        $futureDates = [
            $presentDate->copy()->addMonths(3),
            $presentDate->copy()->addMonths(6),
            $presentDate->copy()->addYear(1),
        ];

        // Present posts
        for ($i = 1; $i <= 4; $i++) {
            Post::create([
                'user_id' => $user->id,
                'title' => "Present Post $i by {$user->name}",
                'text' => "This is content for present post $i. {$user->name} is actively engaging with the community.",
                'location' => 'New York', // Example location
                'image' => "images/liquidationimg.png",
                'begin_date' => $presentDate,
                'end_date' => $presentDate->copy()->addDays(7),
            ]);
        }

        // Future posts
        foreach ($futureDates as $index => $date) {
            Post::create([
                'user_id' => $user->id,
                'title' => "Future Post " . ($index + 1) . " by {$user->name}",
                'text' => "Upcoming event or announcement for future post " . ($index + 1) . ". Stay tuned!",
                'location' => 'London', // Example location
                'image' => "images/liquidationimg1.png",
                'begin_date' => $date,
                'end_date' => $date->copy()->addDays(7),
            ]);
        }

        // Past posts
        foreach ($pastDates as $index => $date) {
            Post::create([
                'user_id' => $user->id,
                'title' => "Past Post " . ($index + 1) . " by {$user->name}",
                'text' => "{$user->name} achieved a milestone in past post " . ($index + 1) . ".",
                'location' => 'Berlin', // Example location
                'image' => "images/liquidationimg2.jpeg",
                'begin_date' => $date,
                'end_date' => $date->copy()->addDays(7),
            ]);
        }
    }
}
