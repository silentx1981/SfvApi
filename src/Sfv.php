<?php

namespace SfvApi;

use SfvApi\Auth\Auth;
use SfvApi\ClubSchedule\Ranking;
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

    public function getRanking($leagueId) : array
    {
        $ranking = new Ranking();
        return json_decode($ranking->getRanking($leagueId), true);
    }

}