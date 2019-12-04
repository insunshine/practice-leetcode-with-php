<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/game-of-life/
 * Class GameOfLife
 * @package problems
 */
class GameOfLife
{
    function solution(array &$board)
    {
        $arr = $board;
        for ($i=0; $i<count($arr); $i++) {
            for ($j=0; $j<count($arr[$i]); $j++) {
                $countLive = 0;
                //左上角
                (!isset($arr[$i-1][$j-1])) ?: ($arr[$i-1][$j-1] == 0 ?: $countLive++);

                //正上
                (!isset($arr[$i-1][$j])) ?: ($arr[$i-1][$j] == 0 ?: $countLive++);

                //右上
                (!isset($arr[$i-1][$j+1])) ?: ($arr[$i-1][$j+1] == 0 ?: $countLive++);

                //左
                (!isset($arr[$i][$j-1])) ?: ($arr[$i][$j-1] == 0 ?: $countLive++);

                //右
                (!isset($arr[$i][$j+1])) ?: ($arr[$i][$j+1] == 0 ?: $countLive++);

                //左下
                (!isset($arr[$i+1][$j-1])) ?: ($arr[$i+1][$j-1] == 0 ?: $countLive++);

                //正下
                (!isset($arr[$i+1][$j])) ?: ($arr[$i+1][$j] == 0 ?: $countLive++);

                //右下
                (!isset($arr[$i+1][$j+1])) ?: ($arr[$i+1][$j+1] == 0 ?: $countLive++);

                if ($countLive == 3 && $arr[$i][$j] == 0) {
                    $board[$i][$j] = 1;
                }

                if (($countLive < 2 || $countLive > 3) && $arr[$i][$j] == 1) {
                    $board[$i][$j] = 0;
                }

            }
        }
    }
}

$re = new GameOfLife();
$tests = [
    [
        [0,1,0],
        [0,0,1],
        [1,1,1],
        [0,0,0]
    ],
];

foreach ($tests as $test) {
    $re->solution($test);
    var_dump($test);
}