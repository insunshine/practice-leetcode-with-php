<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/distribute-candies/solution/fen-tang-guo-by-leetcode/
 * Class DistributeCandies
 * @package problems
 */
class DistributeCandies
{
    function solution($candies)
    {
        $distribute = count($candies) / 2;

        $candiesCategories = count(array_unique($candies));

        if ($candiesCategories > $distribute) {
            return $distribute;
        } else {
            return $candiesCategories;
        }
    }
}

$re = new DistributeCandies();
$tests = [
    [1,1,2,2,3,3],
    [1,1,1,1,2,3],
    [1,1,1,1,2,2,2,1,2,3],
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}