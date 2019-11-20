<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/remove-outermost-parentheses/submissions/
 * Class RemoveOuterParentheses
 * @package problems
 */
class RemoveOuterParentheses
{

    public function solution($S)
    {
        $length = strlen($S);

        $count = 0;
        $position = [0];
        for ($i=0; $i<$length; $i++) {
            $count += $this->map[$S[$i]];

            if ($count == 0 && $i != 0) {
                $position[] = $i;
                $i == $length -1 ?: $position[] = $i+1;
            }
        }

        for ($i=0; $i<$length; $i++) {
            if (in_array($i, $position)) {
                $S[$i] = ' ';
            }
        }

        return str_replace(' ', '', $S);
    }
}

$re = new RemoveOuterParentheses();
$tests = [
    "(()())(())",
    "(()())(())(()(()))",
    "()()"
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}