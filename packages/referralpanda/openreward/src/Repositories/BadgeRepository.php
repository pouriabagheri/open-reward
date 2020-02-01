<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 11.11.2019
 * Time: 12:48
 */
namespace ReferralPanda\OpenReward\Repository;

use ReferralPanda\OpenReward\Repository\Interfaces\BadgeInterface;

class BadgeRepository implements BadgeInterface
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
    }


    /**
     * @param $user
     * @return mixed
     */
    public function addBadgeTo($user)
    {
        $this->model->awardTo($user);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function removeBadgeFrom($user)
    {
        $this->model->removeFrom($user);
    }

    /**
     * @param String $name
     * @param String $description
     * @param String $icon
     * @return mixed
     */
    public function addBadge(String $name, String $description, String $icon)
    {
        return $this->model->create([
            'name' => $name,
            'description' => $description,
            'icon' => $icon
        ]);
    }

    /**
     * @return mixed
     */
    public function deleteBadge()
    {
        $this->model->delete();
    }


    /**
     * @param String $name
     * @param String $description
     * @param String $icon
     * @return mixed
     */
    public function updateBadge(String $name, String $description, String $icon)
    {
        return $this->model->update([
            'name' => $name,
            'description' => $description,
            'icon' => $icon
        ]);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function resetBadgesFor($user)
    {
        $user->badges()->delete();
    }
}