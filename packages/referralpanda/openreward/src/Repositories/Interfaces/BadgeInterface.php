<?php

/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 11.11.2019
 * Time: 12:20
 */
namespace ReferralPanda\OpenReward\Repository\Interfaces;

interface BadgeInterface
{

    /**
     * @param String $name
     * @param String $description
     * @param String $icon
     * @return mixed
     */
    public function addBadge(String $name, String $description, String $icon);

    /**
     * @return mixed
     */
    public function deleteBadge();

    /**
     * @param String $name
     * @param String $description
     * @param String $icon
     * @return mixed
     */
    public function updateBadge(String $name, String $description, String $icon);

    /**
     * @param $user
     * @return mixed
     */
    public function addBadgeTo($user);

    /**
     * @param $user
     * @return mixed
     */
    public function removeBadgeFrom($user);

    /**
     * @param $user
     * @return mixed
     */
    public function resetBadgesFor($user);
}