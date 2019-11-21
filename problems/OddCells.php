<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/cells-with-odd-values-in-a-matrix/
 * Class OddCells
 * @package problems
 */
class OddCells
{
    function solution($n, $m, $indices)
    {
        $arr = [];
        for ($i=0; $i<$n; $i++) {
            for ($j=0; $j<$m; $j++) {
                $arr[$i][$j] = 0;
            }
        }

        foreach ($indices as $value) {
            $row = $value[0];
            $col = $value[1];

            //col
            for ($i=0; $i<$n; $i++) {
                $arr[$i][$col] += 1;
            }

            //row
            for ($j=0; $j<$m; $j++) {
                $arr[$row][$j] += 1;
            }
        }

        $countOdd = 0;
        for ($i=0; $i<$n; $i++) {
            for ($j=0; $j<$m; $j++) {
                if (($arr[$i][$j] & 1) == 1) {
                    $countOdd += 1;
                }
            }
        }
        return $countOdd;
    }
}

$re = new OddCells();
$tests = [
    [2, 3, [[0, 1], [1, 1]]],
    [2, 2, [[1, 1], [0, 0]]]
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1], $test[2]);
    var_dump($res);
}