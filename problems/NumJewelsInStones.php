<?php


namespace problems;


class NumJewelsInStones
{
    public function solution(string $J, string $S)
    {
        $jewels = str_split($J);
        $stones = str_split($S);
        $count = 0;
        foreach ($jewels as $key=>$value) {
            foreach ($stones as $k=>$v) {
                if ($value == $v) {
                    $count++;
                }
            }
        }
        return $count;
    }
}

$re = new NumJewelsInStones();
$tests = [
    ['aA', 'aAAabbbbbbbbbbbbbb'],
    ['Z', 'zzzz']
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}