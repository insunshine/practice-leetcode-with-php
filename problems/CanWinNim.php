<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/nim-game/
 * Class CanWinNim
 * @package problems
 */
class CanWinNim
{
    public function solution($n)
    {
        if ($n < 0 || $n % 4 == 0) {
            return false;
        }
        return true;
    }
}

$re = new CanWinNim();
$tests = [
    4,5,6,7,8
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}