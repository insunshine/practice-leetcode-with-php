<?php


namespace explore\strings;


class ReverseString
{
    public function solution(&$s)
    {
        for ($i=0;$i<count($s)/2; $i++) {
            $tmp = $s[count($s)-$i-1];
            $s[count($s)-$i-1] = $s[$i];
            $s[$i] = $tmp;
        }
    }
}

$reverse = new ReverseString();
$tests = [
    ["h","e","l","l","o"],
    ["H","a","n","n","a","h"]
];

foreach ($tests as $test) {
    $reverse->solution($test);
    var_dump($test);
}

//输入：["h","e","l","l","o"]
//输出：["o","l","l","e","h"]

//输入：["H","a","n","n","a","h"]
//输出：["h","a","n","n","a","H"]