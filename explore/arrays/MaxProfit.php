<?php


namespace explore\arrays;


/**
 * 买卖股票的最佳时机
 * source https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/1/array/22/
 * Class MaxProfit
 * @package src
 */
class MaxProfit
{
    /**
     * @param array $prices
     * @return integer $price
     */
    public function solution($prices)
    {
        $countArray = count($prices);
        if ($countArray == 0 || $countArray == 1) { return 0; }
        $price = 0;
        for ($i=1; $i<$countArray; $i++) {
            if ($prices[$i] > $prices[$i-1]) {
                $price += $prices[$i] - $prices[$i-1];
            }
        }
        return $price;
    }
}

$maxProfit = new MaxProfit();
//[1,2,3,4,5] 示例解释为第一天买入，第五天卖出。此方法为第一天买入，第二天卖出，第二天买入，第三天卖出，以此类推
$testArray = [[7,1,5,3,6,4], [1,2,3,4,4,5], [7,6,4,3,1],[2,1,2,0,1]];

$startTime = microtime(true);
for ($i=0; $i<count($testArray); $i++) {
    $re = $maxProfit->solution($testArray[$i]);
    echo "input: [".implode(',', $testArray[$i])."]\r\n";
    echo "output: {$re}\r\n";
    echo "============================\r\n";
}
$stopTime = microtime(true);
$total = $stopTime - $startTime;
echo "执行时间为{$total}秒";
