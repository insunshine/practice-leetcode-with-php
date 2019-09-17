<?php


namespace problems;


class SortArrayByParity
{
    public function solution($A)
    {
        $odd = [];
        $even = [];
        foreach ($A as $value) {
            if ($value % 2 == 0) {
                $even[] = $value;
            } else {
                $odd[] = $value;
            }
        }
        return array_merge($even, $odd);
    }

    public function solution_2($A)
    {
        $new = $A;
        $start = 0;
        $stop = count($A)-1;
        for ($i=0; $i<count($A); $i++) {
            if ($A[$i] % 2 == 0) {
                $new[$start] = $A[$i];
                $start++;
            } else {
                $new[$stop] = $A[$i];
                $stop--;
            }
        }
        return $new;
    }
}

$re = new SortArrayByParity();
$tests = [
    [3,1,2,4]
];

foreach ($tests as $test) {
    $res = $re->solution_2($test);
    var_dump($res);
}