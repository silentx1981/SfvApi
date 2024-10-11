<?php

namespace SfvApi\ClubSchedule;

use SfvApi\Config\Config;
use SfvApi\Http\ApiClient;

class Ranking
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Config::get('sfvApiCredentials', 'url').'/api/club/ranking';
    }

    public function getRanking(int $leagueId)
    {
        $client = new ApiClient();

        $data = array(
            'SeasonId' => Config::get('sfvApiInfos', 'seasonid'),
            'ClubId' => Config::get('sfvApiInfos', 'clubid'),
            'LeagueId' => $leagueId,
        );

        return $client->get($this->apiUrl, $data);
    }
}