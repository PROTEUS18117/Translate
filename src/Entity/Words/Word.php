<?php

class Word
{
    /** @var string - это означает, что это поле должно быть строкой */
    private $id; // id, строка

    /** @var string */
    private $rus; // слово на русском

    /** @var string */
    private $en; // слово на англ

    /**
     * @param string $id
     * @param string $rus
     * @param string $en
     */
    public function __construct(string $id, string $rus, string $en)
    {
        $this->id = $id;
        $this->rus = $rus;
        $this->en = $en;
    }

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
    public function getRus(): string
    {
        return $this->rus;
    }

    /**
     * @return string
     */
    public function getEn(): string
    {
        return $this->en;
    }

    public function getFront(): string
    {
        return "Слово: " . $this->getEn() . ', перевод ' . $this->getRus();
    }
}


$simpleWord = new Word(
    '1',
    'слово',
    'word'
);

echo $simpleWord->getFront();
