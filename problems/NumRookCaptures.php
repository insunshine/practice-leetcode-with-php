<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/available-captures-for-rook/
 * Class NumRookCaptures
 * @package problems
 */
class NumRookCaptures
{
    public function solution($board)
    {
        $col = $row = 0;
        for ($i=0; $i<8; $i++) {
            for ($j=0; $j<8; $j++) {
                if ($board[$i][$j] == 'R') {
                    $col = $j;
                    $row = $i;
                }
            }
        }

        $count = 0;

        //up
        for ($i=$row; $i>0; $i--) {
            if ($board[$i][$col] == 'p') {
                $count++;
                break;
            }
            if ($board[$i][$col] == 'B') {
                break;
            }
        }

        //down
        for ($i=$row; $i<8; $i++) {
            if ($board[$i][$col] == 'p') {
                $count++;
                break;
            }
            if ($board[$i][$col] == 'B') {
                break;
            }
        }

        //left
        for ($i=$col; $i>0; $i--) {
            if ($board[$row][$i] == 'p') {
                $count++;
                break;
            }
            if ($board[$row][$i] == 'B') {
                break;
            }
        }

        //right
        for ($i=$col; $i<8; $i++) {
            if ($board[$row][$i] == 'p') {
                $count++;
                break;
            }
            if ($board[$row][$i] == 'B') {
                break;
            }
        }

        return $count;
    }
}

$re = new NumRookCaptures();
$tests = [
    [
        [".",".",".",".",".",".",".","."],
        [".",".",".","p",".",".",".","."],
        [".",".",".","R",".",".",".","p"],
        [".",".",".",".",".",".",".","."],
        [".",".",".",".",".",".",".","."],
        [".",".",".","p",".",".",".","."],
        [".",".",".",".",".",".",".","."],
        [".",".",".",".",".",".",".","."]
    ],
    [
        [".",".",".",".",".",".",".","."],
        [".","p","p","p","p","p",".","."],
        [".","p","p","B","p","p",".","."],
        [".","p","B","R","B","p",".","."],
        [".","p","p","B","p","p",".","."],
        [".","p","p","p","p","p",".","."],
        [".",".",".",".",".",".",".","."],
        [".",".",".",".",".",".",".","."]
    ],
    [
        [".",".",".",".",".",".",".","."],
        [".",".",".","p",".",".",".","."],
        [".",".",".","p",".",".",".","."],
        ["p","p",".","R",".","p","B","."],
        [".",".",".",".",".",".",".","."],
        [".",".",".","B",".",".",".","."],
        [".",".",".","p",".",".",".","."],
        [".",".",".",".",".",".",".","."]
    ]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}