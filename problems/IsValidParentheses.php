<?php


namespace problems;

/**
 * 有效的括号
 * source: https://leetcode-cn.com/problems/valid-parentheses/
 * Class IsValidParentheses
 * @package problems
 */
class IsValidParentheses
{
    public function solution($s)
    {
        $s = str_replace(' ', '', $s);
        $num = strlen($s);
        if ($num % 2 != 0) { return false; }

        while (strpos($s, '()') !== false || strpos($s, '[]') !== false || strpos($s, '{}') !== false) {
            $s = str_replace('()', '', $s);
            $s = str_replace('[]', '', $s);
            $s = str_replace('{}', '', $s);
        }

        return $s == '';
    }
}

$median = new IsValidParentheses();
$tests = [
    "()[   ]{}"
];

foreach ($tests as $test) {
    $re = $median->solution($test);
    var_dump($re);
}