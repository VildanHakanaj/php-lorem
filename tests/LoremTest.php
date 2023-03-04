<?php

use JetBrains\PhpStorm\NoReturn;
use VildanHakanaj\Lorem\Lorem;
use PHPUnit\Framework\TestCase;

class LoremTest extends TestCase
{

    private Lorem $lorem;
    private string $wordsString;
    private string $sentenceString;
    private string $paragraphString;

    protected function setUp(): void
    {
        $this->lorem = new Lorem();
        $this->wordsString = $this->lorem->generateWords(5);
        $this->sentenceString = $this->lorem->genereateSentences(5);
        $this->paragraphString = $this->lorem->generateWords(5);
    }

    /** @test */
    public function it_can_create_an_instance(){
        $lorem = new Lorem();
        $this->assertInstanceOf(Lorem::class, $lorem);
    }

    /** @test */
    public function it_can_generate_words_with_count(){
        $words = explode(' ', $this->wordsString);
        $this->assertCount(5, $words);
    }

    /** @test */
    #[NoReturn] public function first_word_is_always_capital_and_last_word_ends_with_period(){
        $words = explode(' ', $this->wordsString);
        preg_match('/^[A-Z]/', $words[0], $match);
        $this->assertCount(1, $match);
    }

    /** @test */
    #[NoReturn] public function it_can_generate_sentences(){
        $sentences = explode(".", trim($this->sentenceString, ". "));
        $this->assertCount(5, $sentences);
    }


    private function data(){
        return [
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
    }

}
