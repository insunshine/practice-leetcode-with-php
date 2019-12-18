<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/distribute-candies-to-people/
 * Class DistributeCandiesII
 * @package problems
 */
class DistributeCandiesII
{
    function solution($candies, $num_people)
    {
        $n = 1;
        $i = 0;

        $arr = [];
        for($j=0; $j<$num_people; $j++) {
            $arr[$j] = 0;
        }

        while(true) {
            $candies -= $n;

            $arr[$i] += $n;

            if ($i == ($num_people - 1)) {
                $i = 0;
            } else {
                $i++;
            }

            $n++;

            if ($candies < $n) {
                $arr[$i] += $candies;
                break;
            }
        }

        return $arr;
    }
}

$re = new DistributeCandiesII();
$tests = [
    //第一次，ans[0] += 1，数组变为 [1,0,0,0]。
    //第二次，ans[1] += 2，数组变为 [1,2,0,0]。
    //第三次，ans[2] += 3，数组变为 [1,2,3,0]。
    //第四次，ans[3] += 1（因为此时只剩下 1 颗糖果），最终数组变为 [1,2,3,1]。
    //[7, 4],

    //第一次，ans[0] += 1，数组变为 [1,0,0]。
    //第二次，ans[1] += 2，数组变为 [1,2,0]。
    //第三次，ans[2] += 3，数组变为 [1,2,3]。
    //第四次，ans[0] += 4，最终数组变为 [5,2,3]。
    //[10, 3]

    [600, 40]
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}