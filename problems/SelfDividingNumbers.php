<?php


namespace problems;

/**
 * 自除数
 * source: https://leetcode-cn.com/problems/self-dividing-numbers/
 * desc: 128 % 1 == 0，128 % 2 == 0，128 % 8 == 0
 * Class SelfDividingNumbers
 * @package problems
 */
class SelfDividingNumbers
{
    public function solution($left, $right)
    {
        $arr = [];
        for ($i=$left; $i<=$right; $i++) {
            $arr[$i] = $i;
            $k = $i;
            while ($k) {
                $tmp = $k % 10;
                $k = floor($k/10);
                if ($tmp == 0 || $i % $tmp != 0) {
                    unset($arr[$i]);
                    break;
                }
            }
        }
        return $arr;
    }
}

$re = new SelfDividingNumbers();
$tests = [
    [1, 1000]
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}