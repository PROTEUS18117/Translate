<?php

namespace App\ReadModal\Word;

class DetailView
{
    /** @var string */
    private $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEng(): string
    {
        return $this->eng;
    }

    /**
     * @return string
     */
    public function getRus(): string
    {
        return $this->rus;
    }

    /** @var string */
    private $eng;

    /** @var string */
    private $rus;

    /**
     * @param string $id
     * @param string $eng
     * @param string $rus
     */
    public function __construct(string $id, string $eng, string $rus)
    {
        $this->id = $id;
        $this->eng = $eng;
        $this->rus = $rus;
    }

    /**
     * @param string $id
     */

}