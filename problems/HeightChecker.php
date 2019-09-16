<?php


namespace problems;

/**
 * source: https://leetcode-cn.com/problems/height-checker/
 * desc:
 * 输入：
 *      [1,1,4,2,1,3]
 *      输出A：3
 *      解释：
 *      高度为 4、3 和最后一个 1 的学生，没有站在正确的位置。
 * Class HeightChecker
 * @package problems
 */
class HeightChecker
{
    public function solution($heights)
    {
        $sorted = $heights;
        sort($sorted);
        $count = 0;
        for ($i=0; $i<count($heights); $i++) {
            if ($sorted[$i] !== $heights[$i]) {
                $count++;
            }
        }
        return $count;
    }
}

$re = new HeightChecker();
$tests = [
    [1,1,4,2,1,3],
    [1,1,1,1,1,1,1,1]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}

