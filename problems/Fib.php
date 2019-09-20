<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/fibonacci-number/
 * desc:
 *      F(0) = 0,   F(1) = 1
 *      F(N) = F(N - 1) + F(N - 2), 其中 N > 1.
 *      示例 1：
 *          输入： 2
 *          输出： 1
 *          解释：F(2) = F(1) + F(0) = 1 + 0 = 1
 *      示例 2
 *          输入： 3
 *          输出： 2
 *          解释：F(3) = F(2) + F(1) = 1 + 1 = 2
 *      示例 3
 *          输入： 4
 *          输出： 3
 *      解释：F(4) = F(3) + F(2) = 2 + 1 = 3.
 * Class Fib
 * @package problems
 */
class Fib
{
    //动态规划
    public function solution($N)
    {
        $current = 0;
        $next = 1;
        while ($N-- > 0) {
            $next = $next + $current;
            $current = $next - $current;
        }
        return (int)$current;
    }
}

$re = new Fib();
$tests = [
    10,
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}