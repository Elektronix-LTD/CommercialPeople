<?php

namespace App\DataFixtures;

use App\Entity\FootballLeague;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FootballLeagueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $premierLeague = new FootballLeague();
        $premierLeague->setName('Premier League');
        $manager->persist($premierLeague);

        $EFLChampionship = new FootballLeague();
        $EFLChampionship->setName('EFL Championship');
        $manager->persist($EFLChampionship);

        $EFLLeagueOne = new FootballLeague();
        $EFLLeagueOne->setName('EFL League One');
        $manager->persist($EFLLeagueOne);

        $EFLLeagueTwo = new FootballLeague();
        $EFLLeagueTwo->setName('EFL League Two');
        $manager->persist($EFLLeagueTwo);

        $nationalLeague = new FootballLeague();
        $nationalLeague->setName('National League');
        $manager->persist($nationalLeague);

        $manager->flush();
    }
}
