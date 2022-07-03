<?php

namespace App\Controller;

use App\Entity\Word;
use App\ReadModal\Word\WordFetcher;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /** @var WordFetcher */
    private $fetcher;

    /**
     * @param WordFetcher $fetcher
     */
    public function __construct(WordFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/", name="home")
     */
    public function show(Request $request): Response
    {
        return $this->render("home.html.twig");
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/search", name="word.search",methods={"GET"})
     */
    public function search(Request $request): Response
    {
        $name = $request->query->get('s');
        if ($name === null or $name === '') {
            throw new HttpException(400, 'Введите цель запроса.');
        }
        $words = $this->fetcher->all($name);
        return $this->render("search.html.twig",['words'=>$words]);

    }


}