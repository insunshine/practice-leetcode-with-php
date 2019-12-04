<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/relative-sort-array/
 * Class RelativeSortArray
 * @package problems
 */
class RelativeSortArray
{
    function solution($arr1, $arr2)
    {
        $arr = [];
        for ($i=0; $i<count($arr2); $i++) {
            while (true) {
                $key = array_search($arr2[$i], $arr1);
                if ($key !== false) {
                    $arr[] = $arr2[$i];
                    unset($arr1[$key]);
                } else {
                    break;
                }
            }
        }
        sort($arr1);
        foreach ($arr1 as $k=>$v) {
            $arr[] = $v;
        }
        return $arr;
    }
}

$re = new RelativeSortArray();
$tests = [
    [[2,3,1,3,2,4,6,7,9,2,19], [2,1,4,3,9,6]],      //[2,2,2,1,4,3,3,9,6,7,19]
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}