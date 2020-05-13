<?php


namespace problems;

/**
 * 山脉数组的峰顶索引
 * https://leetcode-cn.com/problems/peak-index-in-a-mountain-array/
 * Class PeakIndexInMountainArray
 * @package problems
 */
class PeakIndexInMountainArray
{
    public function solution($A)
    {
        $index = 0;
        for ($i=1; $i<count($A); $i++) {
            if($i < count($A)-1 && $A[$i] > $A[$i-1] && $A[$i] > $A[$i+1]) {
                $index = $i;
            }
        }
        return $index;
    }
}

$re = new PeakIndexInMountainArray();
$tests = [
    [0,1,0],
    [0,2,1,0]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}