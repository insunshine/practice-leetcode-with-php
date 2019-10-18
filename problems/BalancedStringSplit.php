<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/split-a-string-in-balanced-strings/solution/
 * Class BalancedStringSplit
 * @package problems
 */
class BalancedStringSplit
{
    public function solution($s)
    {
        $balance = 0;
        $stop = 0;
        $count = 0;

        for ($i=0; $i<strlen($s); $i++) {
            if ($s[$i] == 'L') {
                $balance += 1;
                $stop++;
            } else {
                $balance -= 1;
                $stop++;
            }

            if ($balance == 0) {
                $count++;
                $stop = $i+1;
            }
        }
        return $count;
    }
}

$re = new BalancedStringSplit();
$tests = [
    'RLRRLLRLRL',
    'RLLLLRRRLR',
    'LLLLRRRR'
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}