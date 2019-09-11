<?php


namespace problems;


class SortedSquares
{
    public function solution(array $A)
    {
        /*foreach ($A as $k=>$v) {
            if ($v < 0) {
                $A[$k] = abs($v);
            }
        }
        sort($A);*/
        foreach ($A as $k=>$v) {
            $A[$k] = pow($v, 2);
        }
        sort($A);
        return $A;
    }
}

$re = new SortedSquares();
$tests = [
    [-4,-1,0,3,10],
    [-7,-3,2,3,11],
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}