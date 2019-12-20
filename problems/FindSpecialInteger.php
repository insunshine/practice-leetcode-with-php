<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/element-appearing-more-than-25-in-sorted-array/
 * Class FindSpecialInteger
 * @package problems
 */
class FindSpecialInteger
{
    function solution($arr)
    {
        $n = count($arr);

        $integer = $arr[0];
        $countInteger = 0;
        for ($i=0; $i<$n; $i++) {
            if ($arr[$i] == $integer) {
                ++$countInteger;
                if ($countInteger*4 > $n) {
                    return $integer;
                }
            } else {
                $integer = $arr[$i];
                $countInteger = 1;
            }
        }

        return -1;
    }
}

$re = new FindSpecialInteger();
$tests = [
    [1,2,2,6,6,6,6,7,10],
    //[1],
    [1,1,2,2,3,3,3,3]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}