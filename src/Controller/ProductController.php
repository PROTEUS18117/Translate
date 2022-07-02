<?php

namespace App\Controller;

use App\Entity\Word;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function index(): Response
    {

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    public function createProduct(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();


        $words = new Word();
        $words->setEng('Keyboard');
        $words->setRus('Клавиатура');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($words);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$words->getId());
    }
}
