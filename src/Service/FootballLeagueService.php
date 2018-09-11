<?php
namespace App\Service;

use App\Entity\FootballLeague;
use App\Entity\FootballTeam;
use App\Repository\FootballTeamRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;

/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 09.09.2018
 * Time: 23:40
 */

class FootballLeagueService
{
    use TDoctrineAwareClass;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->setDoctrine($doctrine);
    }

    /**
     * Gets the list of the football leagues.
     * @return iterable
     */
    public function getFootballTeamsList() : iterable
    {
        $footballLeagueRepository = $this->getDoctrine()->getRepository(FootballLeague::class);

        $teamList = [];
        /** @var FootballLeague $league */
        foreach ($footballLeagueRepository->findAll() as $league)
        {
            $teamList[] = [
                'name' => $league->getName(),
                ];
        }
        return $teamList;
    }


    /**
     * @param int $footballLeagueId Football League ID
     * @return FootballLeagueService
     */
    public function deleteFootballLeague(int $footballLeagueId) : self
    {
        $entityManager = $this->getDoctrine()->getManager();
        $footballLeague = $entityManager->getRepository(FootballLeague::class)->find($footballLeagueId);

        $entityManager->remove($footballLeague);
        $entityManager->flush();

        return $this;
    }

}