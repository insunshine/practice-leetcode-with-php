<?php


namespace explore\strings;

/**
 * 实现 strStr() 函数。
 * https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/5/strings/38/
 * desc: 给定一个 haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。如果不存在，则返回  -1。
 * eg:
 * 输入: haystack = "hello", needle = "ll"   输出: 2
 * 输入: haystack = "aaaaa", needle = "bba"  输出: -1
 * Class StrStr
 * @package explore\strings
 */
class StrStr
{
    public function solution($haystack, $needle)
    {
        if (!$needle) { return 0; }
        if (!$haystack || strlen($haystack) < strlen($needle)) { return -1; }

        if (($pos = strpos($haystack, $needle)) !== false) {
            return $pos;
        }
        return -1;
    }

    public function solution_2($haystack, $needle)
    {
        if(!$needle){ return 0; }
        $len = strlen($haystack);
        $length = strlen($needle);

        $i = 0;$j = 0;
        while($i<$len && $j < $length){
            if($haystack[$i] == $needle[$j]){
                $i++;
                $j++;
            }else{
                $i = $i - $j + 1;
                $j = 0;
            }
            if($j == $length){
                return $i-$j;
            }
        }
        return -1;
    }
}

$strStr = new StrStr();
$tests = [
    ['haystack'=>'hello', 'needle'=>'ll'],
    ['haystack'=>'aaaaaa', 'needle'=>'ba'],
    ['haystack'=>'aaaaaa', 'needle'=>'aa'],
    ['haystack'=>'abba', 'needle'=>'bc'],
    ['haystack'=>'', 'needle'=>'ooo'],
    ['haystack'=>'aaa', 'needle'=>'aaa'],
    ['haystack'=>'mississippi', 'needle'=>'mississippi'],
    ['haystack'=>'mississippi', 'needle'=>'issip'],
];

foreach ($tests as $test) {
    $re = $strStr->solution_2($test['haystack'], $test['needle']);
    var_dump($re);
}