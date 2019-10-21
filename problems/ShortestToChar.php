<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/shortest-distance-to-a-character/submissions/
 * Class ShortestToChar
 * @package problems
 */
class ShortestToChar
{
    public function solution($S, $C)
    {
        $addr = [];
        for ($i=0; $i<strlen($S); $i++) {
            if ($S[$i] == $C) {
                $addr[] = $i;
            }
        }

        $distances = [];
        for ($i=0; $i<strlen($S); $i++) {
            $min = strlen($S);
            for ($j=0; $j<count($addr); $j++) {
                $distance = abs($addr[$j] - $i);

                if ($distance < $min) {
                    $min = $distance;
                }
            }

            $distances[$i] = $min;
        }

        return $distances;
    }
}

$re = new ShortestToChar();
$tests = [
    ['loveleetcode', 'e'],
    ['abaa', 'b']
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}