<?php

namespace App\Controller;

use App\Entity\Announce;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnnounceController extends AbstractController
{
    /**
     * @Route("/announce/{id}", name="announce_detail")
     */
    public function details($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $announce = $entityManager->getRepository(Announce::class)->find($id);
        if ($announce instanceof Announce) {
            return $this->render('announce/detail.html.twig', ['announce' => $announce]);
        } else {
            throw $this->createNotFoundException('The announce does not exist');
        }
    }


    /**
     * @Route("/announces", name="announce_list")
     */
    public function list()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $announces = $entityManager->getRepository(Announce::class)->findBy([],['date' => 'DESC'],30);
            return $this->render('announce/list.html.twig', ['announces' => $announces]);
    }
}
