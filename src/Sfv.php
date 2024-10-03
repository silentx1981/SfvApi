<?php

namespace SfvApi;

use SfvApi\Auth\Auth;
use SfvApi\ClubSchedule\Schedule;

class Sfv
{
    public function __construct()
    {
        $auth = new Auth();
        $auth->init();
    }

    public function getGames() : array
    {
        $schedule = new Schedule();
        return json_decode($schedule->getMatches(), true);
    }

}