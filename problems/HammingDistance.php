<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/hamming-distance/
 * Class HammingDistance
 * @package problems
 */
class HammingDistance
{
    public function solution($x, $y)
    {
        $binX = (string)decbin($x);
        $binY = (string)decbin($y);

        $lenX = strlen($binX);
        $lenY = strlen($binY);

        $diff = $lenX - $lenY;
        if ($diff > 0) {
            $len = $lenX;
            $binY = str_pad($binY, $lenX, '0', STR_PAD_LEFT);
        } else {
            $len = $lenY;
            $binX = str_pad($binX, $lenY, '0', STR_PAD_LEFT);
        }

        $distance = 0;
        for ($i=0; $i<$len; $i++) {
            if ($binX[$i] != $binY[$i]) {
                $distance += 1;
            }
        }

        return $distance;
    }

    public function solution_2($x, $y)
    {
        $diff = $x ^ $y;
        $dec = decbin($diff);
        $decArr = str_split($dec);
        $distance = 0;
        foreach ($decArr as $value) {
            $distance += $value;
        }
        return $distance;
    }
}

$re = new HammingDistance();
$tests = [
    [93, 73],
    [1, 4],
];

foreach ($tests as $test) {
    $res = $re->solution_2($test[0], $test[1]);
    var_dump($res);
}