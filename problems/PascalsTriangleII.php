<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/pascals-triangle-ii/
 * Class PascalsTriangleII
 * @package problems
 */
class PascalsTriangleII
{
    function solution($rowIndex)
    {

        $triangle = [[1]];

        for ($i=1; $i<=$rowIndex; $i++) {
            for ($j=0; $j<($i+1); $j++) {
                isset($triangle[$i-1][$j-1]) ? $num1 = $triangle[$i-1][$j-1] : $num1 = 0;
                isset($triangle[$i-1][$j]) ? $num2 = $triangle[$i-1][$j] : $num2 = 0;
                $triangle[$i][$j] = $num1 + $num2;
            }
        }

        return $triangle[$rowIndex];
    }
}

$re = new PascalsTriangleII();
$tests = [
    0,
];

$t = [
    [1],
    [1,1],
    [1,2,1],        //  2 1   0 1     A[i-1][j-1] + A[i-1][j]
    [1,3,3, 1],     //  3 1   0 1  3 2 1 2
    [1,4,6, 4, 1],
    [1,5,10,10,5, 1]
];
foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}