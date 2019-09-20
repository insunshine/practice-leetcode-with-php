<?php


namespace problems;


class Transpose
{
    public function solution($A)
    {
        $transpose = [];
        for ($i=0; $i<count($A); $i++) {
            for ($j=0; $j<count($A[$i]); $j++) {
                $transpose[$j][$i] = $A[$i][$j];
            }
        }
        return $transpose;
    }
}

$re = new Transpose();
$tests = [
    [[1,2,3],[4,5,6],[7,8,9]],      //[[1,4,7],[2,5,8],[3,6,9]]
    [[1,2,3],[4,5,6]],              //[[1,4],[2,5],[3,6]]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}