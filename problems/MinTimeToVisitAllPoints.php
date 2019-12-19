<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/minimum-time-visiting-all-points/
 * Class MinTimeToVisitAllPoints
 * @package problems
 */
class MinTimeToVisitAllPoints
{
    function solution($points)
    {
        $run = 0;
        for ($i=1; $i<count($points); $i++) {
            $length = [];
            $length[] = abs($points[$i][0] - $points[$i-1][0]);
            $length[] = abs($points[$i][1] - $points[$i-1][1]);
            $run += max($length);
        }
        return $run;
    }
}

$re = new MinTimeToVisitAllPoints();
$tests = [
    [[1,1],[3,4],[-1,0]],
    [[3,2], [-2,2]]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}