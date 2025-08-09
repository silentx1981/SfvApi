<?php

namespace SfvApi\ClubSchedule\Service;

use SfvApi\ClubSchedule\Dto\PlayersDto;
use SfvApi\Config\Config;
use SfvApi\Http\ApiClient;

class PlayersService
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Config::get('sfvApiCredentials', 'url').'/api/match/[matchId]/players';
    }

    public function getAllByMatchId(int $matchId) : PlayersDto
    {
        $client = new ApiClient();

        $data = array(
            'SeasonId' => Config::get('sfvApiInfos', 'seasonid'),
            'ClubId' => Config::get('sfvApiInfos', 'clubid'),
        );

        $response = $client->get(str_replace('[matchId]', (string) $matchId, $this->apiUrl), $data);
        if ($response) {
            $players = new PlayersDto(json_decode($response, true));
        } else {
            $players = new PlayersDto([]);
        }

        return $players;
    }
}