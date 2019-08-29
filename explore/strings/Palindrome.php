<?php


namespace explore\strings;

/**
 * 验证回文字符串
 * https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/5/strings/36/
 * desc:
 * eg:
 * 输入: "A man, a plan, a canal: Panama"     输出: true
 * 输入: "race a car"                         输出: false
 * memo:
 * Class Palindrome
 * @package explore\strings
 */
class Palindrome
{
    public function solution($s)
    {
        $s = strtolower($s);
        preg_match_all('/[a-zA-Z0-9]+/i', $s, $matches);
        $arr = str_split(implode('',$matches[0]));

        for ($i=0; $i<ceil(count($arr)/2); $i++) {
            if ($arr[$i] != $arr[count($arr)-$i-1]) {
                return false;
            }
        }
        return true;
    }
}

$palindrome = new Palindrome();
$tests = [
    'A man, a plan, a canal: Panama',
    'race a car',
];

foreach ($tests as $test) {
    $re = $palindrome->solution($test);
    var_dump($re);
}