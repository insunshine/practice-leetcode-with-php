<?php


namespace problems;


class LengthOfLongestSubstring
{
    public function solution($s)
    {
        $sLength = strlen($s);
        $longestSubstring = [];
        $length = $begin = 0;
        for ($end=0; $end<$sLength; $end++) {
            if (isset($longestSubstring[$s[$end]])){
                $longestSubstring[$s[$end]] < $begin ?: $begin = $longestSubstring[$s[$end]];
            }

            $longestSubstring[$s[$end]] = $end+1;
            ($end-$begin+1) < $length ? : $length = $end-$begin+1;
        }

        return $length;
    }
}

$length = new LengthOfLongestSubstring();
$tests = [
    " ",
    "",
    "au",
    "abcabcbb",       //3
    "bbbbbbbb",       //1
    "pwwkew",           //3
];

foreach ($tests as $test) {
    $re = $length->solution($test);
    var_dump($re);
}