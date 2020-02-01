<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 11.11.2019
 * Time: 12:51
 */

namespace ReferralPanda\OpenReward\Exceptions;

use Exception;

class DeactivatedException extends Exception
{
    /**
     * DeactivatedException constructor.
     *
     * @param string $type
     * @param int $id
     */
    public function __construct($type, $id)
    {
        parent::__construct("Entity [{$type}] with ID [{$id}] is deactivated.");
    }
}