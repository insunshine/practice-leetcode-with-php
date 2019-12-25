<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/license-key-formatting/
 * Class LicenseKeyFormatting
 * @package problems
 */
class LicenseKeyFormatting
{
    function solution($S, $K)
    {
        $S = str_replace('-', '', strtoupper($S));
        $mod = strlen($S) % $K;
        $times = floor(strlen($S)/$K);
        $parts = [];

        if ($mod) {
            $parts[] = substr($S, 0, $mod);
            $S = substr($S,  -strlen($S)+$mod);
        }

        for ($i=0; $i<$times; $i++) {
            $parts[] = substr($S, 0, $K);
            $S = substr($S,  -strlen($S)+$K);
        }

        return implode('-', $parts);
    }
}

$re = new LicenseKeyFormatting();
$tests = [
    ['5F3z-2E-9-w', 4],
    ['2-5g-3-J', 2],
    ["2-4A0r7-4k", 4],
];
foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}