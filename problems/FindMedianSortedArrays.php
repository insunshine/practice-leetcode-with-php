<?php


namespace problems;


class FindMedianSortedArrays
{
    function solution($nums1, $nums2)
    {
        $nums = array_merge($nums1, $nums2);
        sort($nums);
        $median = $this->median($nums);
        return $median;
    }

    function median($nums)
    {
        $count = count($nums);
        if ($count % 2 === 0) {
            $median1 = $count/2;
            $median2 = $median1-1;
            return ($nums[$median1]+$nums[$median2])/2;
        } else {
            $median = (int)floor($count/2);
            return $nums[$median];
        }
    }
}

$median = new FindMedianSortedArrays();
$tests = [
    [[1, 3], [2]],
    [[1, 2], [3, 4]],
    [[1,3],[ 5, 99]]
];

foreach ($tests as $test) {
    $re = $median->solution($test[0], $test[1]);
    var_dump($re);
}