<?php


namespace problems;

/**
 * 搜索插入位置
 * Class SearchInsert
 * @package problems
 */
class SearchInsert
{
    function solution($nums, $target)
    {
        $len = count($nums);
        if ($target > $nums[$len-1]) { return $len; }
        if ($target < $nums[0]) { return 0; }
        for ($i=0; $i<$len; $i++) {
            if ($target > $nums[$i] && $target <= $nums[$i+1]) {
                return $i+1;
            }
        }
        return 0;
    }
}

$re = new SearchInsert();
$tests = [
    [[1,3,5,6], 5],
    [[1,3,5,6], 2],
    [[1,3,5,6], 7],
    [[1,3,5,6], 0],
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}