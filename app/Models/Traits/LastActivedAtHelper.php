<?php
/**
 * Created by PhpStorm.
 * User: zhangrui
 * Date: 2018/10/21
 * Time: 10:37
 */

namespace App\Models\Traits;


use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

trait LastActivedAtHelper
{
    protected $hashPrefix = 'pinbbs_last_actived_at_';
    protected $fieldPrefix = 'user_';

    public function recordLastActivedAt()
    {
        $date = Carbon::now()->toDateString();
        $hash = $this->getHashFromDate($date);

        $field = $this->getFieldFromId();

        $now = Carbon::now()->toDateTimeString();

        Redis::hSet($hash, $field, $now);
    }

    public function syncUserActivedAt()
    {
        // xxxx-xx-xx
        $yesterdayDate = Carbon::yesterday()->toDateString();

        $hash = $this->getHashFromDate($yesterdayDate);

        $dates = Redis::hGetAll($hash);

        foreach ($dates as $userId => $actived_at) {
            $userId = str_replace($this->fieldPrefix, '', $userId);

            if ($user = $this->find($userId)) {
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }

        Redis::del($hash);

    }

    public function getLastActivedAtAttribute($value)
    {
        $date = Carbon::now()->toDateString();

        $hash = $this->getHashFromDate($date);

        $field = $this->getFieldFromId();

        $datetime = Redis::hGet($hash, $field) ?: $value;

        if ($datetime) {
            return new Carbon($datetime);
        }

        return $this->created_at;
    }

    private function getHashFromDate($date)
    {
        return $this->hashPrefix . $date;
    }

    private function getFieldFromId()
    {
        return $this->fieldPrefix . $this->attributes['id'];
    }
}