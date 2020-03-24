<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/sqrtx/
 * Class MySqrt
 * @package problems
 */
class MySqrt
{
    function solution($x)
    {
        $start = 1;
        $prev = 0;
        while (true) {
            $result = pow($start, 2);
            if ($result > $x) {
                return $prev;
            } else {
                $prev = $start;
                $start++;
            }
        }
    }

    function solution_2($x)
    {
        return (int)sqrt($x);
    }
}

$re = new MySqrt();
$tests = [
    8, 9, 10
];

foreach ($tests as $test) {
    $res = $re->solution_2($test);
    var_dump($res);
}