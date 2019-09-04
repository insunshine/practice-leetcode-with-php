<?php


namespace explore\arrays;


class ThreeSum
{
    public function solution($nums)
    {
        $countNums = count($nums);
        $arr = [];
        for ($i=0; $i<$countNums; $i++) {
            for ($j=0; $j<$countNums; $j++) {
                for ($k=0; $k<$countNums; $k++) {
                    if ($i != $j && $j != $k && $i != $k) {
                        if ($nums[$i]+$nums[$j]+$nums[$k] == 0) {
                            $arr[] = [$nums[$i], $nums[$j], $nums[$k]];
                        }
                    }
                }
            }
        }
        return $arr;
    }
}

$threeSum = new ThreeSum();
$testArray = [
    [-1, 0, 1, 2, -1, -4]
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $re = $threeSum->solution($item);
    var_dump($re);
}
$stopTime = microtime(true);
$total = round($stopTime - $startTime, 10);
echo "执行时间为{$total}秒";