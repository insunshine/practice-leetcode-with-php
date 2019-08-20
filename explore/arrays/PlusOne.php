<?php


namespace explore\arrays;


/**
 * 加一
 * https://leetcode-cn.com/explore/interview/card/top-interview-questions-easy/1/array/27/
 * Class PlusOne
 * @package src
 */
class PlusOne
{
    public function solution($digits)
    {
        $digits[count($digits)-1] += 1;
        for ($i=count($digits)-1; $i>=0; $i--) {
            if ($digits[$i] >= 10) {
                //本位mod10
                $digits[$i] %= 10;
                if ($i == 0) {
                    array_unshift($digits, 1);
                } else {
                    //前一位加1
                    $digits[$i-1] += 1;
                }
            }
        }
        return $digits;
    }

    public function solution_2($digits)
    {
        $total = count($digits);
        for($i = $total-1; $i >= 0; --$i){
            if($digits[$i] == 9){
                $digits[$i] = 0;
            }else{
                $digits[$i]++;
                return $digits;
            }
        }
        array_unshift($digits,1);
        return $digits;
    }

    public function solution_3($digits)
    {
        $num = count($digits);
        if($digits[$num-1] != 9){
            $digits[$num-1]=$digits[$num-1]+1;
            return $digits;
        }
        $flag = $num-1;
        for($i = $num-1; $i >=0; $i--){
            if($digits[$i]==9){
                continue;
            }else{
                $flag = $i;
                break;
            }
        }
        if($flag == $num-1){
            for($i=0; $i<=$num; $i++){
                $digits[$i]=0;
            }
            $digits[0]=1;
        }else{
            for($i=$flag+1; $i<$num; $i++){
                $digits[$i]=0;
            }
            $digits[$flag]+=1;
        }
        return $digits;
    }
}

$plusOne = new PlusOne();
$testArray = [
    [9,9,9],
    [4,3,2,1]
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $re = $plusOne->solution($item);
    var_dump($re);
}
$stopTime = microtime(true);
$total = round($stopTime - $startTime, 10);
echo "执行时间为{$total}秒";