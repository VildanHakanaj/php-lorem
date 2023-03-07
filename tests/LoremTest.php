<?php

use JetBrains\PhpStorm\NoReturn;
use VildanHakanaj\Lorem;
use PHPUnit\Framework\TestCase;

class LoremTest extends TestCase
{

    private string $wordsString;
    private string $sentenceString;
    private string $paragraphString;

    protected array $data = [
        "original" => [
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
        ],
        "override" => ["This", "should", "override", "original"]
    ];

    protected function setUp(): void
    {
        $lorem = new Lorem();
        $this->wordsString = $lorem->generateWords(5);
        $this->sentenceString = $lorem->generateSentences(5);
        $this->paragraphString = $lorem->generateParagraphs(5);
    }

    /** @test */
    public function it_can_create_an_instance()
    {
        $lorem = new Lorem();
        $this->assertInstanceOf(Lorem::class, $lorem);
    }

    /** @test */
    public function it_can_generate_words_with_count()
    {
        $words = explode(' ', $this->wordsString);
        $this->assertCount(5, $words);

        $words = explode(' ', Lorem::words(6));
        $this->assertCount(6, $words);
    }

    /** @test */
    public function first_word_is_always_capital_and_last_word_ends_with_period()
    {
        $words = explode(' ', $this->wordsString);

        preg_match('/^[A-Z]/', $words[0], $match);
        $this->assertCount(1, $match);
    }

    /** @test */
    public function it_can_generate_sentences()
    {
        $sentences = explode(".", trim($this->sentenceString, ". "));
        $this->assertCount(5, $sentences);

        $sentences = explode(".", trim(Lorem::sentences(6), ". "));
        $this->assertCount(6, $sentences);
    }

    /** @test */
    #[NoReturn] public function it_can_generate_paragraphs()
    {
        $paragraphs = explode("\n\n", $this->paragraphString);
        $this->assertCount(5, $paragraphs);

        $paragraphs = explode("\n\n", Lorem::paragraphs(6));
        $this->assertCount(6, $paragraphs);
    }

    /** @test */
    public function it_can_override_the_default_words()
    {
        $lorem = new Lorem($this->getData("override"));
        $wordsString = $lorem->generateWords(4);
        $words = array_intersect(array_map(fn($e) => strtolower($e), $this->getData("override")), array_map(fn($e) => strtolower($e), explode(" ", trim($wordsString, '. '))));
        $this->assertGreaterThan(0, count($words));
    }

    /** @test */
    public function it_can_create_instance_from_static_method_with_word_override(){
        $lorem = Lorem::withWords($this->getData("override"));

        $wordsString = $lorem->generateWords(4);
        $words = array_intersect(array_map(fn($e) => strtolower($e), $this->getData("override")), array_map(fn($e) => strtolower($e), explode(" ", trim($wordsString, '. '))));

        $this->assertInstanceOf(Lorem::class, $lorem);
        $this->assertGreaterThan(0, count($words));
    }

    private function getData($key = null)
    {
        return $this->data[$key ?? "original"];
    }

}
