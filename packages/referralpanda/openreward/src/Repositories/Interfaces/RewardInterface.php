<?php

/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 11.11.2019
 * Time: 12:20
 */
namespace ReferralPanda\OpenReward\Repository\Interfaces;

interface RewardInterface
{

    /**
     * @param $points
     *
     * @return mixed
     */
    public function reward($points);

    /**
     * @param $points
     *
     * @return mixed
     */
    public function penalize($points);

    /**
     * @param $multiplier
     *
     * @return mixed
     */
    public function multiply($multiplier);

    /**
     * @param $points
     *
     * @return mixed
     */
    public function redeem($points);

    /**
     * @return mixed
     */
    public function deactivate();

    /**
     * @return mixed
     */
    public function activate();

    /**
     * @return mixed
     */
    public function reset();
}