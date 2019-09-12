<?php


namespace problems;


class JudgeCircle
{
    public function __construct()
    {
        $this->move = [
            'R' => [0, 1],
            'L' => [0, -1],
            'U' => [-1, 0],
            'D' => [1, 0],
        ];
    }

    public function solution($moves)
    {
        $init = [0, 0];
        for ($i=0; $i<strlen($moves); $i++) {
            $init = [
                $init[0] + $this->move[$moves[$i]][0],
                $init[1] + $this->move[$moves[$i]][1],
            ];

        }
        return ($init[0] == 0) && ($init[1] == 0);
    }

    public function solution_2($moves)
    {
        return substr_count($moves, 'D') === substr_count($moves, 'U') && substr_count($moves, 'L') === substr_count($moves, 'R');
    }
}

$re = new JudgeCircle();
$tests = [
    "UD"
];

foreach ($tests as $test) {
    $res = $re->solution_2($test);
    var_dump($res);
}