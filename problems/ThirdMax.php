<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/third-maximum-number/
 * Class ThirdMax
 * @package problems
 */
class ThirdMax
{
    function solution($nums)
    {
        $arr = [];
        foreach ($nums as $num) {
            if (!in_array($num, $arr)) {
                array_push($arr, $num);
                if (count($arr) > 3) {
                    sort($arr);
                    array_shift($arr);
                }
            }
        }
        var_dump($arr);
        return count($arr) == 3 ? min($arr) : max($arr);
    }
}

$re = new ThirdMax();
$tests = [
    //[3, 2, 1],
    //[1,2],
    //[2, 2, 3, 1],
    [1,2,2,5,3,5]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}