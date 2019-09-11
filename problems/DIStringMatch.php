<?php


namespace problems;

/**
 * source: https://leetcode-cn.com/problems/di-string-match/submissions/
 * Class DIStringMatch
 * @package problems
 */
class DIStringMatch
{
    function solution($S)
    {
        $len = $j = strlen($S);
        $k = 0;
        $strArr = [];
        for ($i=0; $i<$len; $i++) {
            if ($S[$i] == 'I') {
                $strArr[] = $k;
                $k++;
            } else {
                $strArr[] = $j;
                $j--;
            }
            if ($j == $k) {
                $strArr[] = $k;
            }
        }
        return $strArr;
    }
}

$re = new DIStringMatch();
$tests = [
    "IDID"
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}