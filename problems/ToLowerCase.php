<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/to-lower-case/
 * Class ToLowerCase
 * @package problems
 */
class ToLowerCase
{
    function solution(string $str)
    {
        for ($i=0; $i<strlen($str); $i++) {
            if (ord($str[$i]) >= ord('A') && ord($str[$i]) <= ord('Z')) {
                $str[$i] = (string)(chr(ord($str[$i])+32));
            }
        }
        return $str;
    }
}

$re = new ToLowerCase();
$tests = [
    "LAAAAh",
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}