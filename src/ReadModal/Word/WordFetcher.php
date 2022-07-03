<?php

namespace App\ReadModal\Word;


use App\Entity\Word;
use Doctrine\ORM\EntityManagerInterface;

class WordFetcher
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function fineDetail(string $word): ?DetailView
    {
        dd(3);
        return null;
    }

    public function all(string $search): array
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select("w.rus", "w.eng")->from(Word::class, 'w')
            ->where('w.rus= :s or w.eng= :s')
            ->setParameter("s", $search);
        $result = $qb->getQuery()->getArrayResult();
        return $result;
    }
}