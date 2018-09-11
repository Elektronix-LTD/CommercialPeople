<?php

namespace App\DataFixtures;

use App\Entity\FootballTeam;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FootballTeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $chelsea = new FootballTeam();
        $chelsea->setName('Chelsea');
        $chelsea->setStrip('chelsea1.png');
        $manager->persist($chelsea);

        $manchesterUnited = new FootballTeam();
        $manchesterUnited->setName('Manchester United');
        $manchesterUnited->setStrip('manchester_united.png');
        $manager->persist($manchesterUnited);

        $liverpool = new FootballTeam();
        $liverpool->setName('Liverpool');
        $liverpool->setStrip('liverpool.png');
        $manager->persist($liverpool);

        $arsenal = new FootballTeam();
        $arsenal->setName('Arsenal');
        $arsenal->setStrip('arsenal.png');
        $manager->persist($arsenal);

        $manchesterCity = new FootballTeam();
        $manchesterCity->setName('Manchester City');
        $manchesterCity->setStrip('manchester_city.png');
        $manager->persist($manchesterCity);
        
        $manager->flush();
    }
}
