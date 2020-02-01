<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 20.10.2019
 * Time: 18:10
 */


namespace ReferralPanda\OpenReward\Traits;


use ReferralPanda\OpenReward\Models\Reward;
use ReferralPanda\OpenReward\Repository\RewardRepository;

trait rewardable
{
    /**
     * @param $points
     * @return mixed|void
     * @throws \ReferralPanda\OpenReward\Exceptions\DeactivatedException
     */
    public function reward($points)
    {
        return $this->repo()->reward($points);
    }

    /**
     * @param $points
     * @return mixed|void
     * @throws \ReferralPanda\OpenReward\Exceptions\DeactivatedException
     */
    public function penalize($points)
    {
        return $this->repo()->penalize($points);
    }

    /**
     * @param $multiplier
     * @return mixed|void
     * @throws \ReferralPanda\OpenReward\Exceptions\DeactivatedException
     */
    public function multiply($multiplier)
    {
        return $this->repo()->multiply($multiplier);
    }

    /**
     * @param $points
     **
     * @return bool
     * @throws \ReferralPanda\OpenReward\Exceptions\DeactivatedException
     * @throws \ReferralPanda\OpenReward\Exceptions\InsufficientPointsException
     */
    public function redeem($points)
    {
        return $this->repo()->redeem($points);
    }

    public function deactivate()
    {
        return $this->repo()->deactivate();
    }

    public function activate()
    {
        return $this->repo()->activate();
    }

    public function reset()
    {
        return $this->repo()->reset();
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->rewardable->points;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rewardable->rank;
    }

    /**
     * @return mixed
     */
    public function isDeactivated()
    {
        return !$this->rewardable->active;
    }

    /**
     * @return mixed
     */
    public function rewardable()
    {
        return $this->morphOne(Reward::class, 'rewardable');
    }

    /**
     * @return RewardRepository
     */
    protected function repo()
    {
        return new RewardRepository($this);
    }
}