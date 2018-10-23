<?php

namespace App\Controller;

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
        return $this->render('home/home.html.twig');
    }

}
