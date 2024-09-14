<?php

namespace SfvApi;

class Sfv
{
    /**
     * @param array<string, string> $credentials
     */
    public function __construct(array $credentials)
    {
        // #TODO
        $todo = $credentials;
    }

    /**
     * @param int $teamId
     * @return string[]<string, string>
     */
    public function getGames(int $teamId) : array
    {
        return ['Name' => 'Test'];
    }

}