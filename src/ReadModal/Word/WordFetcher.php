<?php

namespace App\ReadModal\Word;


use Doctrine\ORM\EntityManagerInterface;

class WordFetcher
{
    /** @var EntityManagerInterface  */
    private $em ;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function fineDetail(string $word):?DetailView
    {
        dd(3);
        return null;
    }
}