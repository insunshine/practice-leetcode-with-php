<?php


namespace problems;


class RemoveElement
{
    public function solution(&$nums, $val)
    {
        $len = count($nums);
        $i = 0;
        for ($j=0; $j<$len; $j++) {
            if ($nums[$j] !== $val) {
                $nums[$i] = $nums[$j];
                $i++;
            }
        }
        return $i;
    }
}

$re = new RemoveElement();
$tests = [
    [3,2,2,3]
];

foreach ($tests as $test) {
    $res = $re->solution($test, 2);
    var_dump($res);
    var_dump($test);
}