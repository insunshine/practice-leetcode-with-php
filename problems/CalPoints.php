<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/baseball-game/
 * Class CalPoints
 * @package problems
 */
class CalPoints
{
    public function solution($ops)
    {
        $stack = [];
        $res = 0;
        foreach ($ops as $k=>$op) {
            switch ($op) {
                case "+":
                    count($stack) > 1 ? $end = end($stack) + $stack[count($stack)-2] : $end = end($stack);
                    array_push($stack, (int)$end);
                    $res += end($stack);
                    break;
                case "D":
                    array_push($stack, (int)(end($stack)*2));
                    $res += end($stack);
                    break;
                case "C":
                    $res -= array_pop($stack);
                    break;
                default:
                    array_push($stack, (int)$op);
                    $res += end($stack);
                    break;
            }
            /*echo "op => " . $op . "\r\n";
            echo "res => " . $res . "\r\n";
            echo "stack => " . "\r\n";
            var_dump($stack);
            echo "===============\r\n";*/
        }
        return $res;
    }
}

/**
 *
 * 1. 整数（一轮的得分）：直接表示您在本轮中获得的积分数。
 * 2. "+"（一轮的得分）：表示本轮获得的得分是前两轮有效 回合得分的总和。
 * 3. "D"（一轮的得分）：表示本轮获得的得分是前一轮有效 回合得分的两倍。
 * 4. "C"（一个操作，这不是一个回合的分数）：表示您获得的最后一个有效 回合的分数是无效的，应该被移除。
 *
 * 示例 1:
 * 输入: ["5","2","C","D","+"]
 * 输出: 30
 * 解释:
 * 第1轮：你可以得到5分。总和是：5。
 * 第2轮：你可以得到2分。总和是：7。
 * 操作1：第2轮的数据无效。总和是：5。
 * 第3轮：你可以得到10分（第2轮的数据已被删除）。总数是：15。
 * 第4轮：你可以得到5 + 10 = 15分。总数是：30。
 * 示例 2:
 * 输入: ["5","-2","4","C","D","9","+","+"]
 * 输出: 27
 * 解释:
 * 第1轮：你可以得到5分。总和是：5。
 * 第2轮：你可以得到-2分。总数是：3。
 * 第3轮：你可以得到4分。总和是：7。
 * 操作1：第3轮的数据无效。总数是：3。
 * 第4轮：你可以得到-4分（第三轮的数据已被删除）。总和是：-1。
 * 第5轮：你可以得到9分。总数是：8。
 * 第6轮：你可以得到-4 + 9 = 5分。总数是13。
 * 第7轮：你可以得到9 + 5 = 14分。总数是27。
 */

$re = new CalPoints();
$tests = [
    ["5","2","C","D","+"],
    ["5","-2","4","C","D","9","+","+"],
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}