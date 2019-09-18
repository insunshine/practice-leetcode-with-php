<?php


namespace problems;


class Intersection
{
    public function solution($nums1, $nums2)
    {
        if (count($nums1) > count($nums2)) {
            $re = $this->get_intersection($nums1, $nums2);
        } else {
            $re = $this->get_intersection($nums2, $nums1);
        }
        return $re;
    }

    private function get_intersection($nums1, $nums2)
    {
        $re = [];
        for ($i=0; $i<count($nums1); $i++) {
            if (in_array($nums1[$i], $nums2)) {
                $re[$nums1[$i]] = $nums1[$i];
                $j = array_search($nums1[$i], $nums2);
                unset($nums2[$j]);
            }
        }
        return $re;
    }
}

$re = new Intersection();
$tests = [
    [[1,2,2,1], [2,2]]
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}