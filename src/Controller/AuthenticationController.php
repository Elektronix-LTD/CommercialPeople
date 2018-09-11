<?php

namespace App\Controller;

use App\JWT\JWT;
use DateInterval;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends AbstractController
{
    /**
     * Gives authentication to the user for testing purposes (temporary).
     * @Route("/authenticate", name="authenticate")
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $jwt = new JWT();
        $jwtToken = $jwt->createJWTToken(rand(1,1000)); // passing random user ID for tests only
        $response = new Response(json_encode(['message' => 'User authenticated&authorized to use API.']));
        $response->headers->setCookie(new Cookie('jwt-token', $jwtToken, (new DateTime())->add(new DateInterval('P1M')) ));
        return $response;
    }
}
