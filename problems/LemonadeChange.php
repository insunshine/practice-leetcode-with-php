<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/lemonade-change/
 * Class LemonadeChange
 * @package problems
 */
class LemonadeChange
{
    public function solution($bills)
    {
        if (empty($bills) || $bills[0] > 5) { return false; }

        $countFive = $countTen = 0;
        for ($i=0; $i<count($bills); $i++) {
            if ($bills[$i] == 5) {
                $countFive++;
            } elseif ($bills[$i] == 10) {
                if ($countFive == 0) { return false; }
                $countFive--;
                $countTen++;
            } else {
                if ($countFive > 0 && $countTen > 0) {
                    $countFive--;
                    $countTen--;
                } elseif ($countFive >= 3) {
                    $countFive -= 3;
                } else {
                    return false;
                }
            }
        }

        return true;
    }
}

$re = new LemonadeChange();
$tests = [
    [5, 5, 5, 10, 20]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}