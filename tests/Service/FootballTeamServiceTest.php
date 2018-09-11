<?php
namespace App\Tests;

require 'vendor/autoload.php';

use App\Entity\FootballTeam;
use App\Utils\StringUtils;
use PHPUnit\Framework\TestCase;

class FootballTeamServiceTest extends TestCase
{

    /**
     * @test
     */
    public function FootballTeamTest()
    {
        $randomName = StringUtils::generateRandomText();
        $randomStrip = $randomName.'.png';
        $uniqueFootballTeam = new FootballTeam();
        $uniqueFootballTeam->setName($randomName);
        $uniqueFootballTeam->setStrip($randomStrip);

        $ok = true;
        $ok = $ok && $uniqueFootballTeam->getName() === $randomName;
        $ok = $ok && $uniqueFootballTeam->getStrip() === $randomStrip;

        $this->assertTrue($ok);
    }


}
