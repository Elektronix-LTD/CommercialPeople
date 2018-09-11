<?php

namespace App\Controller;

use App\JSONResponse;
use App\Service\FootballLeagueService;
use App\Service\FootballTeamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FootballLeagueController extends AbstractAPIController
{
    /**
     * @Route("/football/league/{id}", name="deleteFootballLeague", methods={"DELETE"})
     * @param Request $request
     * @return JSONResponse
     */
    public function deleteFootballLeague(Request $request, FootballTeamService $footballTeamService)
    {
        $id = $request->get('id');
        $footballTeamService->deleteFootballLeague($id);
        return new JSONResponse([]);
    }

}