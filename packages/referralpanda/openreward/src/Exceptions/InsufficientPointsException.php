<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 11.11.2019
 * Time: 12:51
 */

namespace ReferralPanda\OpenReward\Exceptions;

use Exception;

class InsufficientPointsException extends Exception
{
    /**
     * InsufficientPointsException constructor.
     *
     * @param string $type
     * @param int $id
     * @param Exception $points
     */
    public function __construct($type, $id, $points)
    {
        $points = abs($points);
        parent::__construct("Entity [{$type}] with ID [{$id}] is missing [{$points}] points.");
    }
}