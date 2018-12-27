<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Service\FacebookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/facebook", name="api_facebook")
     */
    public function facebook()
    {
        $facebookService = $this->get(FacebookService::class);
        return $facebookService->run();
    }


}
