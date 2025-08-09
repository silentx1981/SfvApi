<?php

namespace SfvApi;

use SfvApi\Auth\Auth;
use SfvApi\ClubSchedule\Dto\GamesDto;
use SfvApi\ClubSchedule\Dto\PlayersDto;
use SfvApi\ClubSchedule\Service\PlayersService;
use SfvApi\ClubSchedule\Service\RankingService;
use SfvApi\ClubSchedule\Service\GamesService;

class Sfv
{
    public function __construct()
    {
        $auth = new Auth();
        $auth->init();
    }

    /**
     * @return GamesDto
     */
    public function getGames() : GamesDto
    {
        $games = new GamesService();
        return $games->getAll(true);
    }

    public function getPlayers($matchId) : PlayersDto
    {
        $players = new PlayersService();
        return $players->getAllByMatchId($matchId);
    }

    public function getRanking($leagueId) : array
    {
        $ranking = new RankingService();
        return json_decode($ranking->getRanking($leagueId), true);
    }

}