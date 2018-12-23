<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    /**
     * @Route("/store", name="store")
     */
    public function store()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $products = $entityManager->getRepository(Product::class)->findBy([],['id' => 'DESC']);
        return $this->render('store/store.html.twig', ['products' => $products]);
    }

}
