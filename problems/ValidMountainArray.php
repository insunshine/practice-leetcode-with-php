<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/valid-mountain-array/
 * Class ValidMountainArray
 * @package problems
 */
class ValidMountainArray
{
    const FLAG_INCREMENT = 1;
    const FLAG_DECREMENT = 2;

    public function solution($A)
    {
        $flag = self::FLAG_INCREMENT;
        $flagChangCount = 0;

        for ($i=0; $i<(count($A)-1); $i++) {
            $current = $A[$i];
            $next = $A[$i+1];

            $diff = $current - $next;

            if ($diff > 0 && $flagChangCount==0 && $i != 0) {
                $flag = self::FLAG_DECREMENT;
                $flagChangCount = 1;
            }

            if ($diff >= 0 && $flag == self::FLAG_INCREMENT && $flagChangCount == 0) {
                return false;
            }

            if ($diff <= 0 && $flag == self::FLAG_DECREMENT && $flagChangCount == 1) {
                return false;
            }

        }

        if ($flagChangCount != 1) {
            return false;
        }

        return true;
    }
}

$re = new ValidMountainArray();
$tests = [
    [2,1],
    [3,5,5],
    [0,3,2,1]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}