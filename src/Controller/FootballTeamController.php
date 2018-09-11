<?php

namespace App\Controller;

use App\JSONResponse;
use App\Service\FootballTeamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FootballTeamController extends AbstractAPIController
{
//    /**
//     * @Route("/football/help", name="index", methods={"GET"})
//     */
//    public function index()
//    {
//        return $this->render('football_team/index.html.twig', [
//            'controller_name' => 'FootballTeamController',
//        ]);
//    }
//
//
    /**
     * @Route("/football/team", name="getListOfFootballTeams", methods={"GET"})
     * @param Request             $request
     * @param FootballTeamService $footballTeamService
     * @return JSONResponse
     */
    public function getListOfFootballTeams(Request $request, FootballTeamService $footballTeamService)
    {
//        $id = $request->attributes->get('id');
        $data = $footballTeamService->getFootballTeamsList();
        return new JSONResponse($data);
    }

    /**
     * @Route("/football/team", name="addFootballTeam", methods={"POST"})
     * @param Request $request
     * @return JSONResponse Returns an array with key named `newlyCreatedFootballTeamId` which stores ID of newly created element.
     */
    public function addFootballTeam(Request $request, FootballTeamService $footballTeamService)
    {
//        $request = Request::createFromGlobals();
        $name = $request->get('name');
        $strip = $request->get('strip');
        $data = [
            'newlyCreatedFootballTeamId' => $footballTeamService->createFootballTeam($name, $strip)
        ];
        return new JSONResponse($data);
    }


    /**
     * @Route("/football/team/{id}", name="replaceFootballTeam", methods={"PUT"})
     * @param Request $request
     * @return JSONResponse
     */
    public function replaceFootballTeam(Request $request, FootballTeamService $footballTeamService)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $strip = $request->get('strip');
        $footballTeamService->replaceFootballTeam($id, $name, $strip);
        return new JSONResponse([]);
    }


    /**
     * @Route("/football/team/{id}", name="deleteFootballTeam", methods={"DELETE"})
     * @param Request $request
     * @return JSONResponse
     */
    public function deleteFootballTeam(Request $request, FootballTeamService $footballTeamService)
    {
        $id = $request->get('id');
        $footballTeamService->deleteFootballTeam($id);
        return new JSONResponse([]);
    }

}