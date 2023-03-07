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
     * @param array|null $words Words array to override the default words.
     */
    public function __construct(array $words = null)
    {
        if ($words) {
            $this->words = $words;
        }
    }

    /**
     * @param array $words Words array to override the default words
     * @return Lorem
     */
    public static function withWords(array $words): Lorem
    {
        return new self($words);
    }


    /**
     * @param int $count Number of words to generate
     * @return string Concatenated string of words
     */
    public function generateWords(int $count = 3): string
    {
        $words = [];

        foreach (range(1, $count) as $index) {
            $words[] = $this->applyComma($this->getRandomWord());
        }

        return $this->clean(implode(" ", $words));
    }

    /**
     * @param int $count Number of words to generate
     * @return string Concatenated string of words
     */
    public static function words(int $count = 3): string
    {
        return (new self)->generateWords($count);
    }

    /**
     * @param int $count #Number of sentences generated
     * @return string Complete string with all the sentences
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
     * @param int $count Number of sentences to generate
     * @return string Complete string with all the sentences
     */
    public static function sentences(int $count = 3): string
    {
        return (new self)->generateSentences($count);
    }

    /**
     * @param int $count Number of paragraphs to generate
     * @param bool $html Add &lt;p&gt; around the paragraph
     * @return string Completed string of paragraphs
     */
    public function generateParagraphs(int $count = 3, bool $html = false): string
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
     * @param int $count Number of paragraphs
     * @param bool $html Add &lt;p&gt; around the paragraph
     * @return string Completed string of paragraphs
     */
    public static function paragraphs(int $count = 3, bool $html = false): string
    {
        return (new self)->generateParagraphs($count, $html);
    }

    /**
     * @param string $word Word to add the semicolon
     * @return string
     */
    private function applyComma(string $word): string
    {
        return rand(0, 10) < 2 ? $word . ',' : $word;
    }

    /**
     * @return string Get a random word from the words array
     */
    private function getRandomWord():  string
    {
        return $this->words[rand(0, count($this->words) - 1)];
    }

    /**
     * @param string $string Cleans the string and adds a period at the end;
     * @return string
     */
    private function clean(string $string): string
    {
        return trim(ucfirst(strtolower($string)), ', ') . ".";
    }


}