<?php

namespace ReferralPanda\OpenReward\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reward extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['points', 'rank', 'locked'];
    /**
     * @var array
     */
    protected $casts = [
        'points' => 'integer',
        'rank' => 'integer',
        'locked' => 'boolean',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('open_reward.rewards_table', 'rewards');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function rewardable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->rewardable_id;
    }

    /**
     * @return mixed
     */
    public function getType(): string
    {
        return $this->rewardable_type;
    }
}