<?php

namespace test;

use PHPUnit\Framework\TestCase;
use SfvApi\Sfv;

class svfTest extends TestCase
{
    public function testGetGames()
    {
        $sfv = new Sfv(['username' => 'hallo']);
        $this->assertEquals('Test', $sfv->getGames(1), 'Value "Test" does not exist');
    }
}
