<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = \App\Models\User::all()->pluck('id')->toArray();
        $categoryIds = \App\Models\Category::all()->pluck('id')->toArray();

        $topics = factory(Topic::class)->times(50)->make()->each(function ($topic, $index) use ($userIds, $categoryIds) {
            $topic->user_id = array_random($userIds);
            $topic->category_id = array_random($categoryIds);
        });

        Topic::insert($topics->toArray());
    }

}

