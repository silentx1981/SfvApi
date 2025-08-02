<?php

namespace SfvApi\ClubSchedule\Service;

use SfvApi\Config\Config;
use SfvApi\Http\ApiClient;

class GameService
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Config::get('sfvApiCredentials', 'url').'/api/match/';
    }

    public function getGame(int $gameId) : bool|string
    {
        $client = new ApiClient();

        $data = array(
            'SeasonId' => Config::get('sfvApiInfos', 'seasonid'),
            'ClubId' => Config::get('sfvApiInfos', 'clubid'),
        );

        return $client->get($this->apiUrl.$gameId, $data);
    }
}