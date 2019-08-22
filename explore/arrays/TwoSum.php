<?php


namespace explore\arrays;

/**
 * title: 两数之和
 * description: 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * ext: 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 * source: https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/1/array/29/
 * Class TwoSum
 * @package explore\arrays
 */
class TwoSum
{
    /**
     * runtime 2972 ms
     * @param $nums
     * @param $target
     * @return array
     */
    public function solution($nums, $target)
    {
        $countNums = count($nums);
        if (in_array($countNums, [0,1])) { return []; }
        for ($i=0; $i<$countNums; $i++) {
            $diff = $target - $nums[$i];
            if (($diff >= 0 && $target >= 0) || ($diff <= 0 && $target <= 0)) {
                for ($j=0; $j<$countNums; $j++) {
                    if ($i != $j && $nums[$j] == $diff) {
                        return [$i, $j];
                    }
                }
            }
        }
        return [];
    }

    public function solution_2($nums, $target)
    {
        $res = $map = [];
        foreach($nums as $key => $num) {
            $sub = $target - $num;
            if(isset($map[$sub])) {
                return [$key, $map[$sub]];
            }
            $map[$num] = $key;
        }

        return $res;
    }
}

$twoSum = new TwoSum();
$testArray = [
    [[9,9,9,0], 10],
    [[3,2,4], 6],
    [[-1,-2,-3,-4,-5], -8],
    [[0,4,0,0,0,3,2,1], 7],
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $re = $twoSum->solution_2($item[0], $item[1]);
    var_dump($re);
}
$stopTime = microtime(true);
$total = round($stopTime - $startTime, 10);
echo "执行时间为{$total}秒";