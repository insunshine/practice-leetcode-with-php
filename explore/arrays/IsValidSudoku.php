<?php


namespace explore\arrays;

/**
 * title: 有效的数独
 * description: 判断一个 9x9 的数独是否有效。只需要根据以下规则，验证已经填入的数字是否有效即可。
 * ext:
        1. 数字 1-9 在每一行只能出现一次。
        2. 数字 1-9 在每一列只能出现一次。
        3. 数字 1-9 在每一个以粗实线分隔的 3x3 宫内只能出现一次。
 * explain:
        1. 一个有效的数独（部分已被填充）不一定是可解的。
        2. 只需要根据以上规则，验证已经填入的数字是否有效即可。
        3. 给定数独序列只包含数字 1-9 和字符 '.' 。
        4. 给定数独永远是 9x9 形式的。
 * source:
 * Class IsValidSudoku
 * @package explore\arrays
 */
class IsValidSudoku
{
    /**
     * runtime 40 ms
     * @param $board
     * @return bool
     */
    public function solution($board)
    {
        for ($r=0; $r<9; $r++) {
            $row = $column =  [];
            for ($c = 0; $c < 9; $c++) {
                if ($board[$r][$c] != '.') {
                    $row[] = $board[$r][$c];
                }

                if ($board[$c][$r] != '.') {
                    $column[] = $board[$c][$r];
                }
            }

            if(count($row) != count(array_unique($row))){
                return false;
            }
            if(count($column) != count(array_unique($column))){
                return false;
            }
        }

        for($m=0;$m<9;$m+=3){
            for($n=0;$n<9;$n+=3){
                $grid = [];
                for ($i = $m; $i < $m+3; $i++) {
                    for ($j = $n; $j < ($n+3); $j++) {
                        if ($board[$i][$j] != '.') {
                            $grid[] = $board[$i][$j];
                        }
                    }
                }
                if (count($grid) != count(array_unique($grid))) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * 其他解 runtime 36 ms
     * @param $board
     * @return bool
     */
    public function solution_2($board)
    {
        $rows = [];
        $cols = [];
        $div = [];

        foreach ($board as $k => $arr) {
            foreach ($arr as $f => $col) {
                if ($col == '.') {
                    continue;
                }

                if (isset($rows[$k][$col])) {
                    $rows[$k][$col] ++;
                } else {
                    $rows[$k][$col] = 1;
                }

                if (isset($cols[$f][$col])) {
                    $cols[$f][$col] ++;
                } else {
                    $cols[$f][$col] = 1;
                }

                $v1 = ceil(($k+1) / 3);
                $v2 = ceil(($f+1) / 3);
                $v = ($v1-1)*3+$v2;

                if (isset($div[$v][$col])) {
                    $div[$v][$col] ++;
                } else {
                    $div[$v][$col] = 1;
                }

                if ($rows[$k][$col] > 1 || $cols[$f][$col] > 1 || $div[$v][$col] > 1) {
                    return false;
                }
            }
        }

        return true;
    }
}

$rsValidSudoku = new IsValidSudoku();
$testArray = [
    [
        ["5","3",".",".","7",".",".",".","."],
        ["6",".",".","1","9","5",".",".","."],
        [".","9","8",".",".",".",".","6","."],
        ["8",".",".",".","6",".",".",".","3"],
        ["4",".",".","8",".","3",".",".","1"],
        ["7",".",".",".","2",".",".",".","6"],
        [".","6",".",".",".",".","2","8","."],
        [".",".",".","4","1","9",".",".","5"],
        [".",".",".",".","8",".",".","7","9"]
    ],
    // 除了第一行的第一个数字从 5 改为 8 以外，空格内其他数字均与 示例1 相同。
    // 但由于位于左上角的 3x3 宫内有两个 8 存在, 因此这个数独是无效的。
    [
        ["8","3",".",".","7",".",".",".","."],
        ["6",".",".","1","9","5",".",".","."],
        [".","9","8",".",".",".",".","6","."],
        ["8",".",".",".","6",".",".",".","3"],
        ["4",".",".","8",".","3",".",".","1"],
        ["7",".",".",".","2",".",".",".","6"],
        [".","6",".",".",".",".","2","8","."],
        [".",".",".","4","1","9",".",".","5"],
        [".",".",".",".","8",".",".","7","9"]
    ],
    [
        //     0   1   2   3   4   5   6   7   8
        0 => [".",".",".",".","8",".",".",".","."],
        1 => [".",".",".",".",".",".","5",".","."],
        2 => [".",".",".",".","4",".",".","2","."],
        3 => [".",".",".","3",".","9",".",".","."],
        4 => [".",".","1","8",".",".","9",".","."],
        5 => [".",".",".",".",".","5","1",".","."],
        6 => [".",".","3",".",".","8",".",".","."],
        7 => [".","1","2",".","3",".",".",".","."],
        8 => [".",".",".",".",".","7",".",".","1"]
    ]
];

$startTime = microtime(true);
foreach ($testArray as $item) {
    $re = $rsValidSudoku->solution_2($item);
    var_dump($re);
}
$stopTime = microtime(true);
$total = round($stopTime - $startTime, 10);
echo "执行时间为{$total}秒";