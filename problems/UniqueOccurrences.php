<?php


namespace problems;

use function Couchbase\defaultDecoder;

/**
 * https://leetcode-cn.com/problems/unique-number-of-occurrences/
 * Class UniqueOccurrences
 * @package problems
 */
class UniqueOccurrences
{
    function solution($arr)
    {
        $count = [];
        foreach ($arr as $value) {
            isset($count[$value]) ? $count[$value] += 1 : $count[$value] = 1;
        }

        $unique = array_unique($count);

        return count($unique) == count($count);
    }
}

$re = new UniqueOccurrences();
$tests = [
    [1,2,2,1,1,3],
    [1,2],
    [-3,0,1,-3,1,1,1,-3,10,0]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}