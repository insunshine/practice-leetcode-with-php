<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/add-digits/
 * Class AddDigits
 * @package problems
 */
class AddDigits
{
    public function solution($num) {
        $count = 0;
        while (1) {
            while ($num) {
                $count += $num % 10;
                $num /= 10;
            }

            if ($count >= 10) {
                $num = $count;
                $count = 0;
            } else {
                break;
            }
        }
        return $count;
    }

    public function solution_2($num)
    {
        return ($num -1) % 9 + 1;
    }
}

$re = new AddDigits();
$tests = [
    38, 10, 19
];

foreach ($tests as $test) {
    $res = $re->solution_2($test);
    var_dump($res);
}