<?php


namespace problems;

/**
 * src:
 * Class IslandPerimeter
 * @package problems
 */
class IslandPerimeter
{
    public function solution($grid)
    {
        $count = 0;

        foreach ($grid as $key => $value) {
            foreach ($value as $k => $v) {
                if ($grid[$key][$k] != '1') {
                    continue;
                }

                $length = 4;
                //上
                if (isset($grid[$key-1][$k]) && $grid[$key-1][$k] == '1') {
                    $length--;
                }

                //下
                if (isset($grid[$key+1][$k]) && $grid[$key+1][$k] == '1') {
                    $length--;
                }

                //左
                if (isset($grid[$key][$k-1]) && $grid[$key][$k-1] == '1') {
                    $length--;
                }

                //右
                if (isset($grid[$key][$k+1]) && $grid[$key][$k+1] == '1') {
                    $length--;
                }

                $count += $length;
            }
        }

        return $count;
    }
}

$re = new IslandPerimeter();
$tests = [
    [
        [0,1,0,0],
        [1,1,1,0],
        [0,1,0,0],
        [1,1,0,0],
    ]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}