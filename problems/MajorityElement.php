<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/majority-element/submissions/
 * Class MajorityElement
 * @package problems
 */
class MajorityElement
{
    public function solution($nums)
    {
        $majors = [];
        foreach ($nums as $num) {
            isset($majors[$num]) ? $majors[$num] += 1 : $majors[$num] = 1;
        }

        $n = floor(count($nums) / 2);
        $m = ['num' => 0, 'count' => 0];
        foreach ($majors as $major => $num) {
            if (($num > $n) || ($num > $m['count'])) {
                $m = ['num' => $major, 'count' => $num];
            }
        }

        return $m['num'];
    }
}

$re = new MajorityElement();
$tests = [
    [3,2,3],        //3
    [2,2,1,1,1,2,2], //2
    [3,3,4]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}