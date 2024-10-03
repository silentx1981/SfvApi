<?php

namespace SfvApi\ClubSchedule;

use SfvApi\Config\Config;
use SfvApi\Http\ApiClient;

class Schedule
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Config::get('sfvApiCredentials', 'url').'/api/club/schedule';
    }

    public function getMatches()
    {
        $client = new ApiClient();

        $data = array(
            'SeasonId' => Config::get('sfvApiInfos', 'seasonid'),
            'ClubId' => Config::get('sfvApiInfos', 'clubid'),
        );

        return $client->get($this->apiUrl, $data);
    }
}