<?php


namespace problems;

/**
 * source: https://leetcode-cn.com/problems/sort-array-by-parity-ii/
 * desc: 输入：[4,2,5,7]输出：[4,5,2,7]解释：[4,7,2,5]，[2,5,4,7]，[2,7,4,5] 也会被接受。
 * Class SortArrayByParityII
 * @package problems
 */
class SortArrayByParityII
{

    public function solution($A)
    {
        $oddCurrent = 1;
        $evenCurrent = 0;
        $re = [];
        for ($i=0; $i<count($A); $i++) {
            if (0 === $A[$i] % 2) {
                $re[$evenCurrent] = $A[$i];
                $evenCurrent +=  2;
            } else {
                $re[$oddCurrent] = $A[$i];
                $oddCurrent +=  2;
            }
        }

        ksort($re);
        return $re;
    }

    //不开辟额外空间-双指针
    public function solution_2($A)
    {
        $j = 1;
        for ($i=0; $i<count($A); $i+=2) {
            if ($A[$i] % 2 == 1) {
                while ($A[$j] % 2 == 1) {
                    $j += 2;
                }
                $tmp = $A[$i];
                $A[$i] = $A[$j];
                $A[$j] = $tmp;
            }
        }
        return $A;
    }
}

$re = new SortArrayByParityII();
$tests = [
    [4,2,5,7],
    [3,4]
];

foreach ($tests as $test) {
    $res = $re->solution_2($test);
    var_dump($res);
}