<?php


namespace problems;


class FindComplement
{
    function solution($num)
    {
        $bin = decbin($num);

        for ($i=0; $i<strlen($bin); $i++) {
            $bin[$i] == 1 ? $bin[$i] = 0 : $bin[$i] = 1;
        }

        return bindec($bin);
    }
}

$re = new FindComplement();
$tests = [
    1,5
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}