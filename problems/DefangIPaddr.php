<?php


namespace problems;

/**
 *
 * Class DefangIPaddr
 * @package problems
 */
class DefangIPaddr
{
    /**
     * @param string $address
     * @return mixed
     */
    function solution(string $address)
    {
        return str_replace('.', '[.]', $address);
    }
}

$re = new DefangIPaddr();
$tests = [
    "1.1.1.1",
    "255.100.50.0",
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}