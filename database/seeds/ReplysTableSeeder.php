<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = \App\Models\User::all()->pluck('id')->toArray();
        $topicIds = \App\Models\Topic::all()->pluck('id')->toArray();

        $replys = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($userIds, $topicIds){
            $reply->user_id = array_random($userIds);
            $reply->topic_id = array_random($topicIds);
        });

        Reply::insert($replys->toArray());
    }

}

