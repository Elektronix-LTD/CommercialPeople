<?php
namespace App\Service;

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

class FootballTeamService
{
    use TDoctrineAwareClass;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->setDoctrine($doctrine);
    }

    /**
     * Gets the list of the football teams.
     * @return iterable
     */
    public function getFootballTeamsList(): iterable
    {
        $footballTeamRepository = $this->getDoctrine()->getRepository(FootballTeam::class);

        $teamList = [];
        /** @var FootballTeam $team */
        foreach ($footballTeamRepository->findAll() as $team) {
            $teamList[] = [
                'name' => $team->getName(),
                'strip' => $team->getStrip()
            ];
        }
        return $teamList;
    }

    /**
     * Creates new Football Team.
     * @param string $name  Name of the football team.
     * @param string $strip Football team strip.
     * @return int ID of newly created FootballTeam
     */
    public function createFootballTeam(string $name, string $strip): int
    {
        $entityManager = $this->getDoctrine()->getManager();

        $footballTeam = new FootballTeam();
        $footballTeam->setName($name);
        $footballTeam->setStrip($strip);

        $entityManager->persist($footballTeam);
        $entityManager->flush();

        return $footballTeam->getId();
    }

    /**
     * Replaces attributes of Football Team with specified ID.
     * @param int    $footballTeamId Football Team ID.
     * @param string $name
     * @param string $strip
     * @return FootballTeamService
     */
    public function replaceFootballTeam(int $footballTeamId, string $name, string $strip): self
    {
        $entityManager = $this->getDoctrine()->getManager();
        $footballTeam = $entityManager->getRepository(FootballTeam::class)->find($footballTeamId);

        $footballTeam->setName($name);
        $footballTeam->setStrip($strip);

        $entityManager->persist($footballTeam);
        $entityManager->flush();

        return $this;
    }

    /**
     * @param int $footballTeamId Football Team ID
     * @return FootballTeamService
     */
    public function deleteFootballTeam(int $footballTeamId): self
    {
        $entityManager = $this->getDoctrine()->getManager();
        $footballTeam = $entityManager->getRepository(FootballTeam::class)->find($footballTeamId);
        $entityManager->remove($footballTeam);
        $entityManager->flush();

        return $this;
    }

}