<?php


namespace problems;

/**
 * 判断一个整数是否是回文数
 * source: https://leetcode-cn.com/problems/palindrome-number/
 * Class IsPalindrome
 * @package problems
 */
class IsPalindrome
{
    //转成字符操作
    public function solution($x)
    {
        if ($x < 0) { return false; }
        $str = (string)$x;
        $len = strlen($str);

        for ($i=0; $i<(floor($len/2)); $i++) {
            $tmp = $str[$len-$i-1];
            $str[$len-$i-1] = $str[$i];
            $str[$i] = $tmp;
        }
        if ($str == $x) {
            return true;
        }

        return false;
    }

    //求倒序数值
    public function solution_2($x)
    {
        if ($x < 0) { return false; }

        $cur = 0;
        $num = $x;
        while ($num !=0) {
            $cur = (int)($cur * 10 + $num % 10);
            $num = floor($num / 10);
        }
        return $cur == $x;
    }
}

$median = new IsPalindrome();
$tests = [
    1221
];

foreach ($tests as $test) {
    $re = $median->solution_2($test);
    var_dump($re);
}