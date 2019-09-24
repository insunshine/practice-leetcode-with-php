<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/excel-sheet-column-number/
 * Class TitleToNumber
 * @package problems
 */
class TitleToNumber
{
    public function solution($s)
    {
        //A->1  B->2  C->3  ...  Z->26  AA->27         AB->28  ...     ZY->701   ZZ->702    AAA->703 AAB->704
        $nums = [];
        for ($i=ord('A'); $i<=ord('Z'); $i++) {
            $nums[chr($i)] = $i-64;
        }

        $len = strlen($s);
        $re = 0;
        for ($j=0; $j<$len; $j++) {
            $re = $re*26 + $nums[$s[$j]];
        }

        return $re;
    }
}

$re = new TitleToNumber();
$tests = [
    //'A',
    //'AB',
    //'ZY',
    'AAB'
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}