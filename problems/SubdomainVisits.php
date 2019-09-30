<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/subdomain-visit-count/
 * Class SubDomainVisits
 * @package problems
 */
class SubDomainVisits
{
    public function solution($cpdomains)
    {
        $list = [];
        foreach ($cpdomains as $cpdomain) {
            list($num, $domain) = explode(' ', $cpdomain);
            $domains = explode('.', $domain);

            $tmp = '';
            for ($i=(count($domains)-1); $i>=0; $i--) {
                $tmp = rtrim($domains[$i] . '.' . $tmp, '.');
                isset($list[$tmp]) ? $list[$tmp] += $num : $list[$tmp] = $num;
            }
        }

        $return = [];
        foreach ($list as $key => $value) {
            $return[] = "{$value} {$key}";
        }

        return $return;
    }
}

$re = new SubDomainVisits();
$tests = [
    ["9001 discuss.leetcode.com", "50 yahoo.com"],      //["9001 discuss.leetcode.com", "9001 leetcode.com", "9001 com"]
    //["900 google.mail.com", "50 yahoo.com", "1 intel.mail.com", "5 wiki.org"],      //["900 google.mail.com", "50 yahoo.com", "1 intel.mail.com", "5 wiki.org"]
];

foreach ($tests as $test) {
    $res = $re->solution($test);
    var_dump($res);
}