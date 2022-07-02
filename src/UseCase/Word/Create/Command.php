<?php

namespace App\UseCase\Word\Create;

class Command
{
    /** @var string */
    public $eng;
    /** @var string */
    public $rus;

    /**
     * @param string $eng
     * @param string $rus
     */
    public function __construct(string $eng, string $rus)
    {
        $this->eng = $eng;
        $this->rus = $rus;
    }

    /**
     * @return string
     */
    public function getEng(): string
    {
        return $this->eng;
    }

    /**
     * @param string $eng
     */
    public function setEng(string $eng): void
    {
        $this->eng = $eng;
    }

    /**
     * @return string
     */
    public function getRus(): string
    {
        return $this->rus;
    }

    /**
     * @param string $rus
     */
    public function setRus(string $rus): void
    {
        $this->rus = $rus;
    }

}