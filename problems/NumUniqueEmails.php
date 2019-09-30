<?php


namespace problems;


class NumUniqueEmails
{
    public function solution($emails)
    {
        $res = [];
        foreach ($emails as $email) {
            list($local, $domain) = explode('@', $email);
            preg_match('/([\w.]+)(?:\+[.\w]+)?/', $local, $matches);
            list(, $match) = $matches;
            $match = str_replace('.', '', $match);
            $res[$match.'@'.$domain] = 1;
        }

        return count($res);
    }
}

$re = new NumUniqueEmails();
$tests = [
    [
        "test.email+alex@leetcode.com",
        "test.e.mail+bob.cathy@leetcode.com",
        "testemail+david@lee.tcode.com"
    ],
    [
        "testemail@leetcode.com",
        "testemail1@leetcode.com",
        "testemail+david@lee.tcode.com"
    ]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}