<?php

namespace VildanHakanaj\Lorem;

use http\Exception\InvalidArgumentException;

class Lorem
{
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

    public function __construct($words = null)
    {
        if ($words) {
            $this->words = $words;
        }
    }

    public static function fromWords(array $words): Lorem
    {
        return new self($words);
    }


    public function generateWords(int $count = 3): string
    {
        $string = "";
        foreach (range(1, $count) as $index) {
            $word = $this->getRandomWord();
            $string .= $this->applyRandomSemiColon($word) . " ";
        }

        return $this->clean($string);
    }

    public function genereateSentences(int $count = 3): string
    {

        $sentences = "";
        foreach (range(1, $count) as $index) {
            $wordCount = rand(3, 8);
            $sentences .= $this->generateWords($wordCount) . " ";
        }

        return trim($sentences, " ");

    }

    public static function sentences(int $count = 3): string
    {
        return (new self)->genereateSentences($count);
    }

    public function generateParagraphs(int $count = 3)
    {
        $paragraphs = "";
        foreach (range(1, $count) as $index) {
            $paragraphs .= $this->genereateSentences(rand(5, 15)) . "\\n";
        }

        return trim($paragraphs, "\\n ");
    }

    public static function paragraphs(int $count = 3): string
    {
        return (new self)->generateParagraphs($count);
    }

    private function applyRandomSemiColon($word)
    {
        return rand(0, 10) < 2 ? $word . ',' : $word;
    }

    private function getRandomWord()
    {
        return $this->words[rand(0, count($this->words) - 1)];
    }

    private function clean(string $string): string
    {
        return trim(ucfirst(strtolower($string)), ', ') . ".";
    }

    public static function words(int $count = 3): string
    {
        return (new self)->generateWords($count);
    }


}