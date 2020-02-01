<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 20.10.2019
 * Time: 18:10
 */


namespace ReferralPanda\OpenReward\Traits;

use ReferralPanda\OpenReward\Models\Badge;

trait hasBadge
{


    public function getBadges(){
        return $this->badges;
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'badge_users')
            ->withTimestamps();
    }

}