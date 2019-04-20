<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Purchase;
use App\Form\PurchaseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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

    /**
     * @Route("/store/product/{id}", name="product")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function product(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);
        $user = $this->getUser();
        if ($product instanceof Product) {

            return $this->render('store/product.html.twig', array(
                'product' => $product,
                'user' => $user
            ));
        } else {
            throw $this->createNotFoundException('The product does not exist');
        }

    }

    /**
     * @Route("/store/confirm/{id}", name="confirm")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function confirm(Request $request, \Swift_Mailer $mailer, $id)
    {
        $sent = false;
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);
        $user = $this->getUser();
        if ($product instanceof Product) {

            $purchase = new Purchase();
            $purchase->setProduct($product);
            $purchase->setUser($user);
            $purchase->setCreatedAt(new \DateTime());
            $purchase->setUid(random_int(11111111, 99999999));

            $entityManager->persist($purchase);
            $entityManager->flush();

            $message = (new \Swift_Message('Completa tu proceso de compra'))
                ->setFrom('krenfen@gmail.com')
                ->setTo($purchase->getUser()->getEmail())
                ->setBody(
                    $this->renderView(
                        'emails/purchase.html.twig',
                        array(
                            'purchase' => $purchase,
                            'account' => getenv('bankAccount'),
                            'paypal' => getenv('paypalAccount'),
                            'bizum' => getenv('bizumAccount')
                        )
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);
            $this->addFlash(
                'notice',
                'Te hemos enviado un email con el método de pago.'
            );

            return $this->render('store/confirm.html.twig', array(
                'purchase' => $purchase,
            ));
        } else {
            throw $this->createNotFoundException('The product does not exist');
        }

    }


    /**
     * @Route("/purchase/{id}", name="purchase")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function purchase($id)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $purchase = $entityManager->getRepository(Purchase::class)->find($id);

        if ($purchase instanceof Purchase) {

            return $this->render('store/product.html.twig', array(
                'purchase' => $purchase,
                'sent' => true
            ));
        } else {
            throw $this->createNotFoundException('The purchase does not exist');
        }
    }


    /**
     * @Route("/mail", name="mail")
     */
    public function mail()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $purchase = $entityManager->getRepository(Purchase::class)->find(1);

        return $this->render('emails/purchase.html.twig', array(
            'purchase' => $purchase,
            'account' => getenv('bankAccount')
        ));
    }

}
