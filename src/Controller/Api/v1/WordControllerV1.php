<?php

namespace App\Controller\Api\v1;

use App\Entity\Word;
use Doctrine\Persistence\ManagerRegistry;
use League\Csv\Statement;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use League\Csv\Reader;
use League\Csv\Writer;
use League\Csv\CharsetConverter;

class WordControllerV1 extends AbstractController
{
    /** var */
    public $assocArray;

    /**
     * @param ManagerRegistry $doctrine
     * @param Request $request
     * @return Response
     * @Route("/create", name="word.create",methods={"POST"})
     */
    public function create(ManagerRegistry $doctrine, Request $request): Response
    {
        $assocArray = json_decode($request->getContent(), true);
        $entityManager = $doctrine->getManager();
        $word = new Word(1, $assocArray["eng"], $assocArray["rus"]);
        $entityManager->persist($word);
        $entityManager->flush();

        return new Response('');
    }
    /**
     * @param Request $request
     * @return Response
     * @Route("/word/from-csv", name="word.csv",methods={"POST"})
     */
    public function csv(ManagerRegistry $doctrine, Request $request): Response
    {
        /** @var UploadedFile $file */
        $file = $request->files->get('csv');
        $csv = Reader::createFromPath($file->getRealPath(), 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        $stmt = Statement::create();
        $records = $stmt->process($csv);
        foreach ($records as $record)
        {
            $entityManager = $doctrine->getManager();
            $word = new Word(1, $record["eng"], $record["rus"]);
            $entityManager->persist($word);
            $entityManager->flush();
        }
        return new Response('');
    }
}