<?php


namespace problems;


class DayOfTheWeek
{
    public function __construct()
    {
        $this->weeks = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    }

    public function solution(int $day, int $month, int $year)
    {
        return $this->weeks[date('w', strtotime("{$year}-{$month}-{$day}"))];
    }

    /**
     * 基姆拉尔森日期公式
     * @param int $day
     * @param int $month
     * @param int $year
     * @return mixed
     */
    public function solution_2(int $day, int $month, int $year)
    {
        return $this->weeks[($day + 2*$month + 3*($month+1)/5 + $year + $year/4 - $year/100 + $year/400) % 7];
    }
}

$re = new DayOfTheWeek();
$tests = [
    [31, 8, 2019]
];

foreach ($tests as $test) {
    $res = $re->solution_2($test[0], $test[1], $test[2]);
    var_dump($res);
}