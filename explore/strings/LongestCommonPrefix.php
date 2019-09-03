<?php


namespace explore\strings;

/**
 * 最长公共前缀
 * source: https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/5/strings/40/
 * desc:
 * 输入: ["fl","flower","flow","flight"]输出: "fl"
 * 输入: ["dog","racecar","car"]输出: ""
 * Class LongestCommonPrefix
 * @package explore\strings
 */
class LongestCommonPrefix
{
    function solution($strs)
    {
        $strLength = count($strs);
        if ($strLength == 0) { return ""; }
        if ($strLength == 1) { return $strs[0]; }

        $shortest = strlen($strs[0]);
        for ($i=1; $i<$strLength; $i++) {
            if ($shortest > strlen($strs[$i])) {
                $shortest = strlen($strs[$i]);
            }
        }

        $str = [];
        for ($j=0; $j<$shortest; $j++) {
            for ($i=1; $i<$strLength; $i++) {
                if ($strs[$i][$j] == $strs[$i-1][$j]) {
                    if ($i == ($strLength-1)) {
                        $str[$j] = $strs[$i][$j];
                    }
                    continue;
                } else {
                    break 2;
                }
            }
        }

        return implode($str);
    }

    public function solution_2($strs)
    {
        $num=count($strs);
        if ($num == 0){
            return '';
        }
        sort($strs);
        $a=str_split($strs[0]);
        $b=str_split($strs[$num-1]);
        $st='';
        for($i=0;$i<=$num;$i++){
            if($a[$i] == $b[$i]){
                $st.=$a[$i];
            }else{
                break;
            }
        }
        return $st;
    }
}

$longestCommonPrefix = new LongestCommonPrefix();
$tests = [
    ["flower","flow","flight"],
    ["dog","racecar","car"],
    ["a"],
    ["aa", "aa"],
    ["bba", "aba", "bba"]
];
foreach ($tests as $test) {
    $re = $longestCommonPrefix->solution_2($test);
    var_dump($re);
}