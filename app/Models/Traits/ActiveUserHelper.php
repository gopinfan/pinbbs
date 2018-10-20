<?php
/**
 * Created by PhpStorm.
 * User: zhangrui
 * Date: 2018/10/20
 * Time: 11:50
 */

namespace App\Models\Traits;


use App\Models\Reply;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

trait ActiveUserHelper
{

    protected $users = [];

    protected $topicWeight = 4;
    protected $replyWeight = 1;
    protected $passDays = 7;
    protected $userNumber = 6;

    protected $cacheKey = 'pinbbs_active_users';
    protected $cacheExpireInMinutes = 65;

    public function getActiveUsers()
    {
        return Cache::remember($this->cacheKey, $this->cacheExpireInMinutes, function (){
            return $this->calculateActiveUsers();
        });
    }

    public function calculateAndCacheActiveUsers()
    {
        $activeUsers = $this->calculateActiveUsers();
        $this->cacheActiveUsers($activeUsers);
    }

    private function calculateActiveUsers()
    {
        $this->calculateTopicScore();
        $this->calculateReplyScore();

        $users = array_sort($this->users, function ($user){
            return $user['score'];
        });

        $users = array_reverse($users, true);

        $users = array_slice($users, 0, $this->userNumber, true);

        $activeUsers = collect();

        foreach ($users as $user_id => $user){
            $user = $this->find($user_id);

            if ($user){
                $activeUsers->push($user);
            }
        }

        return $activeUsers;
    }

    private function calculateTopicScore()
    {
        $topicUsers = Topic::query()->select(DB::raw('user_id, count(*) as topic_count'))
            ->where('created_at', '>=', Carbon::now()->subDays($this->passDays))
            ->groupBy('user_id')
            ->get();

        foreach ($topicUsers as $user){
            $this->users[$user->user_id]['score'] = $user->topic_count * $this->topicWeight;
        }
    }

    private function calculateReplyScore()
    {
        $replyUsers = Reply::query()->select(DB::raw('user_id, count(*) as reply_count'))
            ->where('created_at', '>=', Carbon::now()->subDays($this->passDays))
            ->groupBy('user_id')
            ->get();

        foreach ($replyUsers as $user){
            $replyScore = $user->reply_count * $this->replyWeight;
            if (isset($this->users[$user->user_id])){
                $this->users[$user->user_id]['score']+= $replyScore;
            } else {
                $this->users[$user->user_id]['score']= $replyScore;

            }
        }
    }

    private function cacheActiveUsers($activeUsers)
    {
        Cache::put($this->cacheKey, $activeUsers, $this->cacheExpireInMinutes);
    }
}