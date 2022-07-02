<?php

namespace App\Controller\Api\v1;

use App\Entity\Word;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class WordControllerV1 extends AbstractController
{
/** var */
    public $assocArray;
    /**
     * @param Request $request
     * @return Response
     * @Route("/create", name="word.create",methods={"POST"})
     */
    public function create(ManagerRegistry $doctrine, Request $request): Response
    {

        $assocArray = json_decode($request->getContent(), true);

        $entityManager = $doctrine->getManager();

        $word= new Word(1,$assocArray["eng"],$assocArray["rus"]);
        $entityManager->persist($word);
        $entityManager->flush();


        return new Response('');
    }}