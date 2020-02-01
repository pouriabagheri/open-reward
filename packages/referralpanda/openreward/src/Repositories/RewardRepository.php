<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 11.11.2019
 * Time: 12:48
 */
namespace ReferralPanda\OpenReward\Repository;

use ReferralPanda\OpenReward\Exceptions\DeactivatedException;
use ReferralPanda\OpenReward\Exceptions\InsufficientPointsException;
use ReferralPanda\OpenReward\Models\Reward;
use ReferralPanda\OpenReward\Repository\Interfaces\RewardInterface;

class RewardRepository implements RewardInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * EloquentRewardRepository constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
        $this->model->rewardable()->firstOrCreate([],[
            'points' => 0,
            'rank' => 0,
            'active' => 1
        ]);

    }

    /**
     * @param $points
     * @return mixed|void
     * @throws DeactivatedException
     */
    public function reward($points)
    {
        $this->abortIfDeactivated();
        if ($this->getRewardQuery()->count()) {
            $this->getReward()->increment('points', $points);
        } else {
            $this->getRewardQuery()->save(
                new Reward(['points' => $points])
            );
        }
        $this->calculateRankings();
    }

    /**
     * @param $points
     *
     * @throws DeactivatedException
     */
    public function penalize($points)
    {
        $this->abortIfDeactivated();
        $this->getReward()->decrement('points', $points);
        $this->saveRewardInstance();
    }

    /**
     * @param $multiplier
     *
     * @throws DeactivatedException
     */
    public function multiply($multiplier)
    {
        $this->abortIfDeactivated();
        $this->getReward()->points = $this->getReward()->points * $multiplier;
        $this->saveRewardInstance();
    }

    /**
     * @param $points
     **
     * @return bool
     * @throws DeactivatedException
     * @throws InsufficientPointsException
     */
    public function redeem($points)
    {
        $this->abortIfDeactivated();
        $afterRedemeption = $this->getReward()->points - $points;
        if ($afterRedemeption < 0) {
            throw new InsufficientPointsException(
                $this->getReward()->getType(),
                $this->getReward()->getId(),
                $afterRedemeption
            );
        }
        $this->penalize($points);
        return true;
    }
    public function deactivate()
    {
        $this->getReward()->active = false;
        $this->saveRewardInstance();
    }
    public function activate()
    {
        $this->getReward()->active = true;
        $this->saveRewardInstance();
    }

    /**
     * @throws DeactivatedException
     */
    public function reset()
    {
        $this->abortIfDeactivated();
        $this->getReward()->points = 0;
        $this->saveRewardInstance();
    }
    protected function calculateRankings()
    {
        $rewards = Reward::orderBy('points', 'DESC')->get();
        foreach ($rewards as $index => $reward) {
            $reward->rank = $index + 1;
            $reward->push();
        }
    }

    /**
     *
     * @return bool
     * @throws DeactivatedException
     */
    protected function abortIfDeactivated()
    {

        if ($this->model->isDeactivated()) {
            throw new DeactivatedException(
                $this->getReward()->getType(),
                $this->getReward()->getId()
            );
        }
        return false;
    }
    protected function saveRewardInstance()
    {
        $this->getReward()->save();
        $this->calculateRankings();
    }
    /**
     * @return mixed
     */
    protected function getReward()
    {
        return $this->model->rewardable;
    }
    /**
     * @return mixed
     */
    protected function getRewardQuery()
    {
        return $this->model->rewardable();
    }
}