<?php
namespace src;

/**
 * 从排序数组中删除重复项
 * source https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/1/array/21/
 * Class RemoveDuplicates
 * @package src
 */
class RemoveDuplicates
{
    public function solution(&$nums)
    {
        $count = count($nums);
        if ($count <= 1) {
            return count($nums);
        }
        $j = 0;
        for ($i = 1; $i < $count; $i++) {
            if ($nums[$i] != $nums[$j]) {
                $j += 1;
                $nums[$j] = $nums[$i];
            }
        }
        return array_slice($nums, 0, $j + 1);
    }
}