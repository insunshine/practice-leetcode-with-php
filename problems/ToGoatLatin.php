<?php


namespace problems;


class ToGoatLatin
{
    public function solution(string $S)
    {
        $vowel = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

        $words = explode(' ', $S);

        foreach ($words as $k=>$word) {
            if (in_array($word[0], $vowel)) {
                $words[$k] = $word . 'ma';
            } else {
                $first = $word[0];
                $words[$k] = substr($word, 1) . $first . 'ma';
            }

            for ($i=0; $i<($k+1); $i++) {
                $words[$k] .= 'a';
            }
        }

        return implode(' ', $words);
    }
}

$re = new ToGoatLatin();
$tests = [
    "I speak Goat Latin",       //"Imaa peaksmaaa oatGmaaaa atinLmaaaaa"
    "The quick brown fox jumped over the lazy dog"
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}