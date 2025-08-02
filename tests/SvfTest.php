<?php

namespace test;

use PHPUnit\Framework\TestCase;
use SfvApi\ClubSchedule\Dto\GamesDto;
use SfvApi\Sfv;

class svfTest extends TestCase
{
    public function testGetGames()
    {
        $sfv = new Sfv(['username' => 'hallo']);
        $expected = new GamesDto([]);
        $this->assertEquals($expected, $sfv->getGames(), 'Value "Test" does not exist');
    }
}
