<?php


namespace explore\strings;

/**
 * https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/5/strings/35/
 * 有效的字母异位词
 * desc: 给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
 * eg:
 * 输入: s = "anagram", t = "nagaram" 输出: true
 * 输入: s = "rat", t = "car"输出: false
 * memo: 你可以假设字符串只包含小写字母。
 * Class Anagram
 * @package explore\strings
 */
class Anagram
{
    public function solution($s, $t)
    {
        $sArr =  str_split($s);
        $tArr =  str_split($t);
        $sArrTmp = $this->handle($sArr);
        $tArrTmp = $this->handle($tArr);
        if ($sArrTmp == $tArrTmp) {
            return true;
        }

        return false;
    }

    private function handle($arr)
    {
        $tmp = [];
        foreach ($arr as $value) {
            isset($tmp[$value]) ? $tmp[$value] += 1 : $tmp[$value] = 1;
        }
        return $tmp;
    }
}

$anagram = new Anagram();
$tests = [
    ['s' => 'anagram', 't' => 'nagaram'],
    ['s' => 'rat', 't' => 'car'],
];

foreach ($tests as $test) {
    $re = $anagram->solution($test['s'], $test['t']);
    var_dump($re);
}