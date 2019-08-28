<?php


namespace explore\arrays;

/**
 * 旋转图像
 * Class RotateMatrix
 * @package explore\arrays
 */
class RotateImage
{
    public function solution(&$matrix)
    {
        $length = count($matrix);
        //对角调换
        for ($i=0; $i<$length; $i++) {
            for ($j=0; $j<$length-$i; $j++) {
                $tmp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$length-$j-1][$length-$i-1];
                $matrix[$length-$j-1][$length-$i-1] = $tmp;
            }
        }

        //列调换
        for ($i=0; $i<$length; $i++) {
            for ($j=0; $j<ceil($length/2); $j++) {
                $tmp = $matrix[$j][$i];
                $matrix[$j][$i] = $matrix[$length-$j-1][$i];
                $matrix[$length-$j-1][$i] = $tmp;
            }
        }
    }

    public function solution_2(&$matrix)
    {
        $y_length = count($matrix) - 1;
        $tmp_matrix = $matrix;
        foreach($tmp_matrix AS $key => $value){
            foreach($value AS $key2 => $value2){
                $matrix[$key2][$y_length - $key] = $value2;
            }
        }
    }

    public function solution_3(&$matrix)
    {
        $index = count($matrix[0]) - 1;

        for($j = 0;$j < $index;$j++) {
            for ($i = 0; $i < $index - $j * 2; $i++) {
                $arr = [$matrix[$j][$i + $j], $matrix[$i + $j][$index - $j], $matrix[$index - $j][$index - $i - $j], $matrix[$index - $i - $j][$j]];


                $n = array_pop($arr);
                array_unshift($arr, $n);

                list($matrix[$j][$i + $j], $matrix[$i + $j][$index - $j], $matrix[$index - $j][$index - $i - $j], $matrix[$index - $i - $j][$j]) = $arr;
            }
        }
    }
}

$rotate = new RotateImage();
$testArray = [
    [
        //    0  1  2
        0 => [1, 2, 3],
        1 => [4, 5, 6],
        2 => [7, 8, 9],
        //[
        //   [7, 4, 1],     [2][0]=>[0][0] [1][0]=>[0][1] [0][0]=>[0][2]
        //   [8, 5, 2],     [2][1]=>[1][0] [1][1]=>[1][1] [0][1]=>[1][2]
        //   [9, 6, 3]      [2][2]=>[2][0] [1][2]=>[2][1] [0][2]=>[2][2]
        //]
    ],
    [
        [ 5, 1, 9,11],      //[0][0]=>[0][3] [0][1]=>[1][3] [0][2]=>[2][3] [0][3]=>[3][3]
        [ 2, 4, 8,10],      //[1][0]=>[0][2] [1][1]=>[1][2] [1][2]=>[2][2] [1][3]=>[3][2]
        [13, 3, 6, 7],      //[2][0]=>[0][1] [2][1]=>[1][1] [2][2]=>[2][1] [2][3]=>[3][1]
        [15,14,12,16]       //[3][0]=>[0][0] [3][1]=>[1][0] [3][2]=>[2][0] [3][3]=>[3][0]
        //  [15,13, 2, 5],
        //  [14, 3, 4, 1],
        //  [12, 6, 8, 9],
        //  [16, 7,10,11]
    ],
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $rotate->solution($item);
    var_dump($item);
}
$stopTime = microtime(true);
$total = round($stopTime - $startTime, 10);
echo "执行时间为{$total}秒";