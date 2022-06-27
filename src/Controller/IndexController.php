<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
    * @param Request $request
    * @return Response
    * @Route("/", name="procedure.new_show")
    */
    public function show(Request $request): Response 
    {
        return $this->render("home.html.twig");
    }
}