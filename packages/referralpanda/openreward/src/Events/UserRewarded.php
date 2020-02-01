<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 3.11.2019
 * Time: 00:07
 */

namespace ReferralPanda\OpenReward\Events;

use Illuminate\Queue\SerializesModels;
use ReferralPanda\OpenReward\Models\Reward;

class UserRewarded
{
    use SerializesModels;

    public $user;

    public $reward;

    public function __construct($user, Reward $reward)
    {
        $this->user = $user;
        $this->reward = $reward;
    }
}