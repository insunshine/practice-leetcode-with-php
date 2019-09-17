<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/array-partition-i/
 * desc:
 *      给定长度为 2n 的数组, 你的任务是将这些数分成 n 对, 例如 (a1, b1), (a2, b2), ..., (an, bn) ，使得从1 到 n 的 min(ai, bi) 总和最大。
 *      输入: [1,4,3,2]
 *      输出:
 *      解释: n 等于 2, 最大总和为 4 = min(1, 2) + min(3, 4).
 * Class ArrayPairSum
 * @package problems
 */
class ArrayPairSum
{
    public function solution($nums)
    {
        sort($nums);
        $num = 0;
        for ($i=0; $i<count($nums); $i++) {
            if (($i+1) % 2 !== 0) {
                $num += $nums[$i];
            }
        }
        return $num;
    }
}

$re = new ArrayPairSum();
$tests = [
    [1,1],
    [1,4,3,2],      //1 2 3 4
    [1,2,3,4,5,6]   //1 2 3 4 5 6
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}