<?php


namespace problems;


class ReverseWords
{
    public function solution($s)
    {
        $arr = explode(' ', $s);
        for ($i=0; $i<count($arr); $i++) {
            for ($j=0; $j<floor(strlen($arr[$i])/2); $j++) {
                $tmp = $arr[$i][$j];
                $arr[$i][$j] = $arr[$i][strlen($arr[$i])-$j-1];
                $arr[$i][strlen($arr[$i])-$j-1] = $tmp;
            }
        }
        return implode(' ', $arr);
    }
}

$re = new ReverseWords();
$tests = [
    'Hello World',
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}