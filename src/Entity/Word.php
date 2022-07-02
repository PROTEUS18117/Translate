<?php

namespace App\Entity;

use App\Repository\WordsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WordsRepository::class)
 */
class Word
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eng;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rus;

    /**
     * @param $id
     * @param $eng
     * @param $rus
     */
    public function __construct($id, $eng, $rus)
    {
        $this->id = $id;
        $this->eng = $eng;
        $this->rus = $rus;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEng(): ?string
    {
        return $this->eng;
    }

    public function setEng(string $eng): self
    {
        $this->eng = $eng;

        return $this;
    }

    public function getRus(): ?string
    {
        return $this->rus;
    }

    public function setRus(string $rus): self
    {
        $this->rus = $rus;

        return $this;
    }
}
