<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/flipping-an-image/solution/
 * Class FlipAndInvertImage
 * @package problems
 */
class FlipAndInvertImage
{
    function solution($A)
    {
        for ($i=0; $i<count($A); $i++) {
            $length = count($A[$i]);
            $middle = ceil($length/2);

            for ($j=0; $j<$middle; $j++) {
                $tmp = $A[$i][$j] ^ 1;
                $A[$i][$j] = $A[$i][$length-1-$j] ^ 1;
                $A[$i][$length-1-$j] = $tmp;
            }
        }

        return $A;
    }
}

$re = new FlipAndInvertImage();
$tests = [
      [[1,1,0],[1,0,1],[0,0,0]],
    //[[0,1,1],[1,0,1],[0,0,0]],
    //[[1,0,0],[0,1,0],[1,1,1]]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}