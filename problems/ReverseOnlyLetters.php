<?php


namespace problems;

/**
 * https://leetcode-cn.com/problems/reverse-only-letters/
 * Class ReverseOnlyLetters
 * @package problems
 */
class ReverseOnlyLetters
{
    function solution($S)
    {

        if (strlen($S) <= 1) return $S;

        $tmpS = [];
        $symbols = [];
        for ($i=0; $i<strlen($S); $i++) {
            preg_match('/[a-z]/i', $S[$i], $matches);
            if (!empty($matches)) {
                $tmpS[] = $S[$i];
            } else {
                $symbols[$i] = $S[$i];
            }
        }

        /*$middle = ceil(count($tmpS) / 2);
        $start = 0;
        $end = count($tmpS)-1;
        while($start < $middle) {
            $tmp = $tmpS[$start];
            $tmpS[$start] = $tmpS[$end];
            $tmpS[$end] = $tmp;
            $start++;
            $end--;
        }*/
        $tmpS = array_reverse($tmpS);

        foreach ($symbols as $key => $symbol) {
            array_splice($tmpS, $key, 0, $symbols[$key]);
        }
        return implode('', $tmpS);
    }

    //双指针
    function solution_2($S)
    {

    }
}

$re = new ReverseOnlyLetters();
$tests = [
    'ab-cd',                //dc-ba
    'a-bC-dEf-ghIj',        //j-Ih-gfE-dCba
    'Test1ng-Leet=code-Q!', //Qedo1ct-eeLg=ntse-T!
    'a-bC-dEf-ghIj',            //"j-Ih-gfE-dCba"
    "-",
    "7_28]",
    "Czyr^",     //"ryzC^"
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}