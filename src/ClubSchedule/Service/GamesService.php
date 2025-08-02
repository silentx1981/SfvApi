<?php

namespace SfvApi\ClubSchedule\Service;

use SfvApi\ClubSchedule\Dto\GameDto;
use SfvApi\ClubSchedule\Dto\GamesDto;
use SfvApi\Config\Config;
use SfvApi\Http\ApiClient;

class GamesService
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Config::get('sfvApiCredentials', 'url').'/api/club/schedule';
    }

    /**
     * @return GamesDto
     */
    public function getAll($withDetails = false) : GamesDto
    {
        $client = new ApiClient();

        $data = array(
            'SeasonId' => Config::get('sfvApiInfos', 'seasonid'),
            'ClubId' => Config::get('sfvApiInfos', 'clubid'),
        );

        $response = $client->get($this->apiUrl, $data);

        if ($response) {
            $games = new GamesDto(json_decode($response, true));
        } else {
            $games = new GamesDto([]);
        }

        if ($withDetails) {
            $games = $this->getDetails($games);
        }

        return $games;
    }

    /**
     * @param GamesDto $gamesDto
     * @return GamesDto
     */
    private function getDetails(GamesDto $gamesDto) : GamesDto
    {
        $gameService = new GameService();

        /** @var GameDto[] $games */
        $games = $gamesDto->getGames();
        foreach ($games as $game) {
            $matchId = $game->getMatchId();
            $response = $gameService->getGame($matchId);
            $gameDetails = json_decode($response, true);
            $game->setLeagueIdA($gameDetails['teams'][0]['teamLeagueId'] ?? '');
            $game->setLeagueIdB($gameDetails['teams'][1]['teamLeagueId'] ?? '');
            $game->setLeagueNameA($gameDetails['teams'][0]['teamLeagueName'] ?? '');
            $game->setLeagueNameB($gameDetails['teams'][1]['teamLeagueName'] ?? '');
            $game->setScoreTeamAHalftime($gameDetails['intermediateResults'][0]['scoreTeamA'] ?? null);
            $game->setScoreTeamBHalftime($gameDetails['intermediateResults'][0]['scoreTeamB'] ?? null);
        }

        return $gamesDto;
    }


}