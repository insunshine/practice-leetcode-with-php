<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/unique-morse-code-words/
 * Class UniqueMorseRepresentations
 * @package problems
 */
class UniqueMorseRepresentations
{
    public function __construct()
    {
        $this->morse = [
            "a" => ".-",
            "b" => "-...",
            "c" => "-.-.",
            "d" => "-..",
            "e" => ".",
            "f" => "..-.",
            "g" => "--.",
            "h" => "....",
            "i" => "..",
            "j" => ".---",
            "k" => "-.-",
            "l" => ".-..",
            "m" => "--",
            "n" => "-.",
            "o" => "---",
            "p" => ".--.",
            "q" => "--.-",
            "r" => ".-.",
            "s" => "...",
            "t" => "-",
            "u" => "..-",
            "v" => "...-",
            "w" => ".--",
            "x" => "-..-",
            "y" => "-.--",
            "z" => "--.."
        ];
    }

    public function solution($words)
    {
        $changes = [];
        foreach ($words as $word) {
            $map = str_split($word);
            $morseCode = '';
            foreach ($map as $value) {
                $morseCode.=$this->morse[$value];
            }
            $changes[$morseCode] = 1;
        }
        return count($changes);
    }
}

$re = new UniqueMorseRepresentations();
$tests = [
    ["gin", "zen", "gig", "msg"],
    ["gin", "zen", "gig", "msg"]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}