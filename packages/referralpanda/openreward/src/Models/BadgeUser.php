<?php
namespace ReferralPanda\OpenReward\Models;

use Illuminate\Database\Eloquent\Model;

class BadgeUser extends Model
{
   public function __construct(array $attributes = [])
   {
       parent::__construct($attributes);
       $this->table = config('open_reward.badge_users_table', 'badge_users');

   }

   public function badge(){
       return $this->belongsTo(Badge::class);
   }



}