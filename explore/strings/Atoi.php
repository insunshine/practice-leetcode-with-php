<?php


namespace explore\strings;

/**
 * 字符串转换整数
 * https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/5/strings/37/
 * Class Atoi
 * @package explore\strings
 */
class Atoi
{
    public function solution($str)
    {
        $max = pow(2, 31) - 1;
        $min = pow(-2, 31);
        preg_match_all('/^[\s]*[-|+]?[0-9]+/', $str, $matches);
        if (!empty($matches[0])) {
            $num = (int)trim($matches[0][0]);
            if ($num > $max) {
                return $max;
            }
            if ($num < $min) {
                return $min;
            }
            return $num;
        }
        return 0;
    }

    /**
     * 4ms
     * @param $str
     * @return int|string
     */
    function solution_2($str) {
        $str = trim($str);
        $len = strlen($str);
        $result = '';
        $result = substr($str, 0, 1);
        if(!is_numeric($result) && $result != '+' && $result !=  '-' ) {
            return 0;
        }
        for($i = 1; $i < $len; $i++) {
            $letter = substr($str, $i, 1);
            if(is_numeric($letter)) {
                $result .= $letter;
            } else {
                break;
            }
        }
        if($result == '+' || $result == '-') {
            return 0;
        }elseif($result < '-2147483648') {
            return '-2147483648';
        } else if($result >= '2147483648') {
            return '2147483647';
        } else {
            return (int) $result;
        }
    }
}

$atoi = new Atoi();
$tests = [
    '99',
    '    -42',
    '4399 +22222222 iiiii',
    '    with 99',
    "2147483648",
    "4000  ds 400",
];

foreach ($tests as $test) {
    $re = $atoi->solution_2($test);
    var_dump($re);
}