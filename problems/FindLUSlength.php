<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/longest-uncommon-subsequence-i/
 * Class FindLUSlength
 * @package problems
 */
class FindLUSlength
{
    //特殊字符串，只需要$a与$b不相同即可
    function solution($a, $b)
    {
        $a == $b ? $return = -1 : $return = max([strlen($a), strlen($b)]);
        return $return;
    }
}

$re = new FindLUSlength();
$tests = [
    ['aba', 'aaacdc']
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}