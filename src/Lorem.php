<?php

namespace VildanHakanaj;

class Lorem
{
    /**
     * @var string[]
     */
    private array $words = [
        "Lorem",
        "ipsum",
        "dolor",
        "sit",
        "amet",
        "consectetur",
        "adipiscing",
        "elit",
        "sed",
        "do",
        "eiusmod",
        "tempor",
        "incididunt",
        "ut",
        "labore",
        "et",
        "dolore",
        "magna",
        "aliqua",
        "Aliquet",
        "sagittis",
        "id",
        "consectetur",
        "purus",
        "ut",
        "faucibus",
        "Amet",
        "tellus",
        "cras",
        "adipiscing",
        "enim",
        "eu",
        "turpis",
        "egestas",
        "Diam",
        "quis",
        "enim",
        "lobortis",
        "scelerisque",
        "fermentum",
        "dui",
        "Ultrices",
        "mi",
        "tempus",
        "imperdiet",
        "nulla",
        "malesuada",
        "pellentesque",
        "Nunc",
        "sed",
        "velit",
        "dignissim",
        "sodales",
        "ut",
        "eu",
        "sem",
        "integer",
        "Leo",
        "vel",
        "fringilla",
        "est",
        "ullamcorper",
        "Ullamcorper",
        "morbi",
        "tincidunt",
        "ornare",
        "massa",
        "eget",
        "egestas",
        "purus",
        "viverra",
        "accumsan",
        "Id",
        "volutpat",
        "lacus",
        "laoreet",
        "non",
        "curabitur",
        "gravida",
        "Urna",
        "condimentum",
        "mattis",
        "pellentesque",
        "id",
        "Vestibulum",
        "sed",
        "arcu",
        "non",
        "odio",
        "euismod",
        "Nibh",
        "mauris",
        "cursus",
        "mattis",
        "molestie",
        "a",
        "iaculis",
        "at",
        "erat",
        "pellentesque",
        "Non",
        "consectetur",
        "a",
        "erat",
        "nam",
        "at",
        "lectus",
        "urna"
    ];

    /**
     * @param $words
     */
    public function __construct($words = null)
    {
        if ($words) {
            $this->words = $words;
        }
    }

    /**
     * @param array $words
     * @return Lorem
     */
    public static function withWords(array $words): Lorem
    {
        return new self($words);
    }


    /**
     * @param int $count
     * @return string
     */
    public function generateWords(int $count = 3): string
    {
        $words = [];

        foreach (range(1, $count) as $index) {
            $words[] = $this->applyRandomSemiColon($this->getRandomWord());
        }

        return $this->clean(implode(" ", $words));
    }

    /**
     * @param int $count
     * @return string
     */
    public static function words(int $count = 3): string
    {
        return (new self)->generateWords($count);
    }

    /**
     * @param int $count
     * @return string
     */
    public function generateSentences(int $count = 3): string
    {

        $sentences = [];
        foreach (range(1, $count) as $index) {
            $sentences[] = $this->generateWords(rand(3, 8));
        }

        return implode(" ", $sentences);

    }

    /**
     * @param int $count
     * @return string
     */
    public static function sentences(int $count = 3): string
    {
        return (new self)->generateSentences($count);
    }

    /**
     * @param int $count
     * @return string
     */
    public function generateParagraphs(int $count = 3, $html = false): string
    {
        $paragraphs = [];
        foreach (range(1, $count) as $index) {
            $paragraph = $this->generateSentences(rand(5, 15));

            if($html){
                $paragraph = "<p>$paragraph</p>";
            }

            $paragraphs[] = $paragraph;
        }

        return implode("\n\n", $paragraphs);
    }

    /**
     * @param int $count
     * @return string
     */
    public static function paragraphs(int $count = 3): string
    {
        return (new self)->generateParagraphs($count);
    }

    /**
     * @param string $word
     * @return string
     */
    private function applyRandomSemiColon(string $word): string
    {
        return rand(0, 10) < 2 ? $word . ',' : $word;
    }

    /**
     * @return string
     */
    private function getRandomWord():  string
    {
        return $this->words[rand(0, count($this->words) - 1)];
    }

    private function clean(string $string): string
    {
        return trim(ucfirst(strtolower($string)), ', ') . ".";
    }


}