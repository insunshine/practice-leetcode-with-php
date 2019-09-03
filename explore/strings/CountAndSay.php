<?php


namespace explore\strings;

/**
 * 报数序列是一个整数序列，按照其中的整数的顺序进行报数，得到下一个数。其前五项如下：
 * 1.     1
 * 2.     11
 * 3.     21
 * 4.     1211
 * 5.     111221
 * 1  被读作  "one 1"  ("一个一") , 即 11。
 * 11 被读作 "two 1s" ("两个一"）, 即 21。
 * 21 被读作 "one 2",  "one 1" （"一个二" ,  "一个一") , 即 1211。

 * 给定一个正整数 n（1 ≤ n ≤ 30），输出报数序列的第 n 项。
 * 注意：整数顺序将表示为一个字符串。
 * Class CountAndSay
 * @package explore\strings
 */
class CountAndSay
{
    public function solution($n)
    {
        $str = '1';
        for ($i=1; $i<$n; $i++) {
            var_dump($str);
            $str = self::plus_one($str, $i);
        }
        return $str;
    }

    public function plus_one($str, $n)
    {
        $tmp = '';
        for ($j=0,$count=1; $j<strlen($str); $j++,$count=1) {
            while ($str[$j] == $str[$j + 1]) {
                $count++;
                $j++;
            }
            $tmp .= $count;
            $tmp .= $str[$j];
        }
        return $tmp;
    }

    public function solution_2($n)
    {
        $p = '1';
        if ($n == 1) {
            return "1";
        }

        for($i=0;$i<$n-1;$i++){
            $q='';
            $num = 1;
            $c = strlen($p);

            for ($s=0;$s<$c;$s++) {
                if ($s == $c -1) {

                    $a = $num;
                    $dd = $a.$p[$s];
                    $q .= $dd;

                } elseif(isset($p[$s+1])) {
                    if ($p[$s] == $p[$s+1]) {
                        $num ++;
                    }else {
                        $ds = $num.$p[$s];
                        $num = 1;
                        $q .= $ds;
                    }
                }
            }
            $p = $q;
        }


        return $p;
    }
}

$countAndSay = new CountAndSay();
$tests = [
    2
];
foreach ($tests as $test) {
    $re = $countAndSay->solution($test);
    var_dump($re);
}