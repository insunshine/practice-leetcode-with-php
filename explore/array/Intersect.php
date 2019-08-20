<?php


namespace src;

/**
 * 两个数组的交集 II
 * https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/1/array/26/
 * Class Intersect
 * @package src
 */
class Intersect
{
    public function solution($nums1, $nums2)
    {
        $countNums1 = count($nums1);
        $countNums2 = count($nums2);

        $tmp1 = [];
        for ($i=0; $i<$countNums1; $i++) {
            if (isset($tmp1[$nums1[$i]])) {
                $tmp1[$nums1[$i]] += 1;
            } else {
                $tmp1[$nums1[$i]] = 1;
            }
        }

        $tmp2 = [];
        for ($j=0; $j<$countNums2; $j++) {
            if (array_key_exists($nums2[$j], $tmp1)) {
                $tmp1[$nums2[$j]] -= 1;
                $tmp2[] = $nums2[$j];
                //当tmp1数组已没有该元素，删除
                if ($tmp1[$nums2[$j]] == 0) {
                    unset($tmp1[$nums2[$j]]);
                }
            }
        }

        return $tmp2;
    }

    /**
     * 12ms
     * @param $nums1
     * @param $nums2
     * @return array
     */
    public function solution_2($nums1, $nums2)
    {
        $result  = [];
        $hashMap = [];
        foreach ($nums1 as $k => $v) {
            $hashMap[$v] = array_key_exists($v, $hashMap) ? $hashMap[$v] += 1 : 1;
        }

        foreach ($nums2 as $v) {
            if (isset($hashMap[$v]) && $hashMap[$v] >= 1) {
                $result[]    = $v;
                $hashMap[$v] -= 1;
            }
        }

        sort($result);
        return $result;
    }

    /**
     * 8ms
     * @param $nums1
     * @param $nums2
     * @return array
     */
    public function solution_3($nums1, $nums2)
    {
        $r = $a = [];
        if(count($nums1) == 0 || count($nums2) == 0 )return [];
        foreach($nums1 as $v){
            if(isset($a[$v])){
                $a[$v]++;
            } else {
                $a[$v] = 1;
            }
        }

        foreach($nums2 as $v){
            if($a[$v] > 0) {
                $r[] = $v;
                $a[$v]--;
            }
        }
        return $r;
    }
}

$intersect = new Intersect();
$testArray = [
    [[1,2,2,1], [2,2]],
    [[4,9,5], [9,4,9,8,4]],
    [[1,2,2,1], [2]],
    [[2], [1,2,2,1]],
    [[2,1], [1,2]]
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $re = $intersect->solution($item[0], $item[1]);
    var_dump($re);
}
$stopTime = microtime(true);
$total = $stopTime - $startTime;
echo "执行时间为{$total}秒";