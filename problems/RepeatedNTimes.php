<?php


namespace problems;


use explore\arrays\IsValidSudoku;

class RepeatedNTimes
{
    public function solution($A)
    {
        $n = count($A)/2;

        $tmp = [];
        for ($i=0; $i<count($A); $i++) {
            isset($tmp[$A[$i]]) ? $tmp[$A[$i]] += 1 : $tmp[$A[$i]]=1;
        }

        foreach ($tmp as $key=>$value) {
            if ($value == $n) {
                return $key;
            }
        }

        return 0;
    }
}

$re = new RepeatedNTimes();
$tests = [
    [5,1,5,2,5,3,5,4]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}