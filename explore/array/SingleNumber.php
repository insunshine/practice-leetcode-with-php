<?php


namespace src;

/**
 * 只出现一次的数字
 * https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/1/array/25/
 * 给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 * 阶梯思路： 异或操作  2^2=0   2^0=0   2^1=3
 * Class SingleNumber
 * @package src
 */
class SingleNumber
{
    public function solution($nums)
    {
        $re = 0;
        for ($i=0; $i<count($nums); $i++) {
            $re ^= $nums[$i];
        }
        return $re;
    }
}

$singleNumber = new SingleNumber();
$testArray = [
    ['data' => [1,2,3,2,1]],
    ['data' => [4,1,1,2,2]],
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $re = $singleNumber->solution($item['data']);
    var_dump($re);
}
$stopTime = microtime(true);
$total = $stopTime - $startTime;
echo "执行时间为{$total}秒";