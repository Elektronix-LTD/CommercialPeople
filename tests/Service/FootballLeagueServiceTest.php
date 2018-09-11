<?php

namespace App\Tests;

require 'vendor/autoload.php';

use App\Entity\FootballLeague;
use App\Utils\StringUtils;
use PHPUnit\Framework\TestCase;

class FootballLeagueServiceTest extends TestCase
{
    /**
     * @test
     */
    public function FootballLeagueTest()
    {
        $randomName = StringUtils::generateRandomText();
        $uniqueFootballLeague = new FootballLeague();
        $uniqueFootballLeague->setName($randomName);

        $ok = true;
        $ok = $ok && $uniqueFootballLeague->getName() === $randomName;

        $this->assertTrue($ok);
    }
}
