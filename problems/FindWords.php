<?php


namespace problems;


class FindWords
{
    public function __construct()
    {
        $this->raw = [
            'qwertyuiop',
            'asdfghjkl',
            'zxcvbnm'
        ];
    }

    public function solution($words)
    {
        $find = [];
        $pos = 0;
        for ($k=0; $k<count($words); $k++) {
            $word = strtolower($words[$k]);
            for ($j=0; $j<3; $j++) {
                if (strpos($this->raw[$j], $word[0]) !== false) {
                    $pos = $j;
                    $find[$k] = $words[$k];
                }
            }
            for ($i=1; $i<strlen($word); $i++) {
                if (strpos($this->raw[$pos], $word[$i]) === false) {
                    unset($find[$k]);
                    continue;
                }
            }
        }
        return $find;
    }
}

$re = new FindWords();
$tests = [
    ["Hello", "Alaska", "Dad", "Peace"]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}