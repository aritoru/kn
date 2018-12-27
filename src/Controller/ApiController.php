<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Service\FacebookService;
use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/facebook", name="api_facebook")
     */
    public function facebook(FacebookService $facebookService)
    {
        return $facebookService->run();
    }

    /**
     * @Route("/api/twitter", name="api_twitter")
     */
    public function twitter(Request $request, TwitterService $twitterService) {
        $url = $request->get('url');
        $count = $request->get('count');
        $include_rts = $request->get('include_rts');
        $exclude_replies = $request->get('exclude_replies');
        return $this->render('api/response.html.twig', ['response' => $twitterService->run($url, $count, $include_rts, $exclude_replies)]);
        //return new JsonResponse($twitterService->run($url, $count, $include_rts, $exclude_replies));
    }


}
