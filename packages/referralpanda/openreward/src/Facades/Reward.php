<?php
/**
 * Created by PhpStorm.
 * User: poorya
 * Date: 2.11.2019
 * Time: 23:57
 */

namespace ReferralPanda\OpenRewrad\Facades;

use Illuminate\Support\Facades\Facade;

class Reward extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'reward';
    }
}