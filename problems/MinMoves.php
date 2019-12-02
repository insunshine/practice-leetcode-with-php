<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/minimum-moves-to-equal-array-elements/
 * Class MinMoves
 * @package problems
 */
class MinMoves
{
    function solution($nums)
    {
        $count = count($nums);
        if ($count == 1 && $count == 0) { return 0; }
        if ($count == 2) {
            $max = max($nums);
            $min = min($nums);
            return $max - $min;
        }

        $moveCount = $count - 1;
        $step = 0;
        while (true) {
            $unique = array_unique($nums);
            if (count($unique) == 1) {
                break;
            }

            sort($nums);
            for ($i=0; $i<$moveCount; $i++) {
                $nums[$i] += 1;
            }
            $step += 1;
        }

        return $step;
    }

    public function solution_2($nums)
    {
        sort($nums);

        $step = 0;
        for ($i=count($nums)-1; $i>0; $i--) {
            $step += $nums[$i] - $nums[0];
        }
        return $step;
    }
}

$re = new MinMoves();
$tests = [
    [1,2,3],
    [1,2,3,4],
    [1,1,1],
    [1,1,2147483647]
];

foreach ($tests as $test) {
    $res = $re->solution_2($test);
    var_dump($res);
}