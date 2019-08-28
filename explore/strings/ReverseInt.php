<?php


namespace explore\strings;

/**
 * 假设我们的环境只能存储得下 32 位的有符号整数，
 * 则其数值范围为 [−2^31,  2^31 − 1]。
 * 请根据这个假设，如果反转后整数溢出那么就返回 0。
 * Class ReverseInt
 * @package explore\strings
 */
class ReverseInt
{
    public function solution($x)
    {
        $re = 0;
        while ($x) {
            $tmp = $re * 10 + $x % 10;
            if ((int)($tmp/10) != $re || $tmp > pow(2, 31) || $tmp < (pow(-2, 31) -1) ) {
                return 0;
            }
            $re = $tmp;
            $x = (int)($x/10);
        }
        return $re;
    }
}

$reverse = new ReverseInt();
$tests = [
    1534236469,123,-123,120
    //321,-321,21
];

foreach ($tests as $test) {
    $re = $reverse->solution($test);
    var_dump($re);
}