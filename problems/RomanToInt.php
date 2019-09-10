<?php


namespace problems;

/**
 * 罗马数字转整数
 * source: https://leetcode-cn.com/problems/roman-to-integer/
 * Class RomanToInt
 * @package problems
 */
class RomanToInt
{
    public function __construct()
    {
        $this->turnRoman = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
            'IV' => 4,
            'IX' => 9,
            'XL' =>40,
            'XC' => 90,
            'CD' => 400,
            'CM' => 900,
        ];
    }

    public function solution($s)
    {
        $len = strlen($s);

        $num = 0;
        for ($i=0; $i<$len; $i++) {
            if ($i<($len-1)) {
                if ($s[$i] == 'I') {
                    if ($s[$i+1] == 'V' || $s[$i+1] == 'X') {
                        $num += $this->turnRoman[$s[$i].$s[$i+1]];
                        $i++;
                    } else {
                        $num += $this->turnRoman[$s[$i]];
                    }
                } elseif ($s[$i] == 'X') {
                    if ($s[$i+1] == 'L' || $s[$i+1] == 'C') {
                        $num += $this->turnRoman[$s[$i].$s[$i+1]];
                        $i++;
                    } else {
                        $num += $this->turnRoman[$s[$i]];
                    }
                } elseif ($s[$i] == 'C') {
                    if ($s[$i+1] == 'D' || $s[$i+1] == 'M') {
                        $num += $this->turnRoman[$s[$i].$s[$i+1]];
                        $i++;
                    } else {
                        $num += $this->turnRoman[$s[$i]];
                    }
                } else {
                    $num += $this->turnRoman[$s[$i]];
                }
            } else {
                $num += $this->turnRoman[$s[$i]];
            }
        }

        return $num;
    }

    public function solution_2($s)
    {
        $len = strlen($s);

        $num = 0;
        for ($i=0; $i<$len; $i++) {
            if ($i < ($len -1) && array_key_exists($s[$i].$s[$i+1], $this->turnRoman)) {
                $num += $this->turnRoman[$s[$i].$s[$i+1]];
                $i++;
            } else {
                $num += $this->turnRoman[$s[$i]];
            }
        }
        return $num;
    }
}

$median = new RomanToInt();
$tests = [
    'III', 'IV', 'IX', 'LVIII', 'MCMXCIV', 'IM'
];

foreach ($tests as $test) {
    $re = $median->solution_2($test);
    var_dump($re);
}