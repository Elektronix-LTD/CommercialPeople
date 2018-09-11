<?php

namespace App\EventSubscriber;

use App\JWT\JWT;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestSubscriber implements EventSubscriberInterface
{

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $jwtToken = $request->cookies->get('jwt-token');
        $jwt = new JWT();

        // Exception for Authentication endpoint (for the development time)
        if ($request->getRequestUri() == '/authenticate') // temporary, for easier testing
            return;

        if (!$jwt->checkJWTToken($jwtToken))
        {
            $response = new Response(json_encode(['message' => 'Access Denied']), 401);
            /** @var Response $response */
            $event->setResponse($response);
            $event->stopPropagation();
        }
    }

    public static function getSubscribedEvents()
    {
        return [
           'kernel.request' => 'onKernelRequest',
        ];
    }
}
