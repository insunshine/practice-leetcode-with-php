<?php


namespace problems;

/**
 *https://leetcode-cn.com/problems/largest-number-at-least-twice-of-others/submissions/
 * Class DominantIndex
 * @package problems
 */
class DominantIndex
{
    function solution($nums)
    {
        $max = 0;
        $flag = 0;
        foreach ($nums as $key => $num)
        {
            if ($num > $max) {
                $max = $num;
                $flag = $key;
            }
        }

        sort($nums);
        $secondMax = $nums[count($nums)-2] * 2;
        $max = end($nums);

        $return = -1;
        $secondMax > $max ?: $return = $flag;
        return $return;
    }
}

$re = new DominantIndex();
$tests = [
    [3, 6, 1, 0],
    [1, 2, 3, 4]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}