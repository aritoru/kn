<?php

namespace App\Controller;

use App\Entity\Announce;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="root")
     */
    public function root()
    {
        return $this->render('home/splash.html.twig');
    }
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $announces = $entityManager->getRepository(Announce::class)->findBy([],['date' => 'DESC'],3);
        return $this->render('home/home.html.twig', ['announces' => $announces, 'facebookAppId' => getenv('facebookAppId')]);
    }
    /**
     * @Route("/band", name="band")
     */
    public function band()
    {
        return $this->render('home/band.html.twig');
    }

    /**
     * @Route("/social", name="social")
     */
    public function social()
    {
        return $this->render('home/social.html.twig', ['appId' => getenv('facebookAppId')]);
    }

    /**
     * @Route("/media", name="media")
     */
    public function media()
    {
        return $this->render('home/media.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('home/contact.html.twig');
    }

}
