<?php


namespace src;


class Rotate
{
    function solution_1(&$nums, $k)
    {
        $countArr = count($nums);
        if ($k === $countArr) {
            return $nums;
        }
        if ($k > $countArr) {
            $k = $k % $countArr;
        }
        $tmp = [];
        for ($i=0; $i<$countArr; $i++) {
            if ($i < $k) {
                $tmp[$i] = $nums[$countArr-$k+$i];
            } else {
                $tmp[$i] = $nums[$i-$k];
            }
        }
        //$nums = $tmp;
        return $tmp;
    }
    
    function solution_2(&$nums, $K)
    {

    }
}

$rotate = new Rotate();
$testArray = [
    ['data' => [1,2,3,4,5,6,7], 'k' => 3],
    ['data' => [-1,-100,3,99], 'k' => 2],
    ['data' => [1,2], 'k'=> 3],
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $re = $rotate->solution_1($item['data'], $item['k']);
    echo "input: [".implode(',', $item['data'])."]\r\n";
    echo "output: [".implode(',', $re)."]\r\n";
    echo "============================\r\n";
}
$stopTime = microtime(true);
$total = $stopTime - $startTime;
echo "执行时间为{$total}秒";