<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/toeplitz-matrix/submissions/
 * Class IsToeplitzMatrix
 * @package problems
 */
class IsToeplitzMatrix
{
    //判断元素是否等于它左上角的元素
    public function solution($matrix)
    {
        if (count($matrix) == 1 || count($matrix[0]) == 1) return true;

        for ($i=1; $i<count($matrix); $i++) {
            for ($j=1; $j<count($matrix[0]); $j++) {
                if ($matrix[$i][$j] !== $matrix[$i-1][$j-1]) return false;
            }
        }

        return true;
    }

    //上一行除掉最后一个元素等于下一行除掉第一个元素
    public function solution_2($matrix)
    {
        if (count($matrix) == 1 || count($matrix[0]) == 1) return true;

        for ($i=(count($matrix)-1); $i>0; $i--) {
            foreach ($matrix[$i] as $v) {

            }
        }

        return true;
    }
}


$re = new IsToeplitzMatrix();
$tests = [
    [
        [1,2,3,4],
        [5,1,2,3],
        [9,5,1,2]
    ],

    [
        [1,2],
        [2,2]
    ],
];

foreach ($tests as $test) {
    $res = $re->solution_2($test);
    var_dump($res);
}