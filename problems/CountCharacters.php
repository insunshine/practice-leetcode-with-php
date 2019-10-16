<?php


namespace problems;

/**
 * src: https://leetcode-cn.com/problems/find-words-that-can-be-formed-by-characters/solution/
 * Class CountCharacters
 * @package problems
 */
class CountCharacters
{
    public function solution($words, $chars)
    {
        $arr = [];
        for ($i=0; $i<count($words); $i++) {
            $arr[$i] = $words[$i];
            $tmp = $chars;
            for ($j=0; $j<strlen($words[$i]); $j++) {
                if (strpos($tmp, $words[$i][$j]) !== false) {
                    $tmp = preg_replace("/{$words[$i][$j]}/", '', $tmp, 1);
                } else {
                    unset($arr[$i]);
                    break;
                }
            }
        }

        return strlen(implode($arr));
    }
}

$re = new CountCharacters();
$tests = [
    [
        ["cat","bt","hat","tree"], 'atach'
    ],
    [
        ["hello","world","leetcode"], 'welldonehoneyr'
    ],
    [
        ["dyiclysmffuhibgfvapygkorkqllqlvokosagyelotobicwcmebnpznjbirzrzsrtzjxhsfpiwyfhzyonmuabtlwin",
            "ndqeyhhcquplmznwslewjzuyfgklssvkqxmqjpwhrshycmvrb",
            "ulrrbpspyudncdlbkxkrqpivfftrggemkpyjl",
            "boygirdlggnh",
            "xmqohbyqwagkjzpyawsydmdaattthmuvjbzwpyopyafphx",
            "nulvimegcsiwvhwuiyednoxpugfeimnnyeoczuzxgxbqjvegcxeqnjbwnbvowastqhojepisusvsidhqmszbrnynkyop",
            "hiefuovybkpgzygprmndrkyspoiyapdwkxebgsmodhzpx","juldqdzeskpffaoqcyyxiqqowsalqumddcufhouhrskozhlmobiwzxnhdkidr",
            "lnnvsdcrvzfmrvurucrzlfyigcycffpiuoo",
            "oxgaskztzroxuntiwlfyufddl",
            "tfspedteabxatkaypitjfkhkkigdwdkctqbczcugripkgcyfezpuklfqfcsccboarbfbjfrkxp",
            "qnagrpfzlyrouolqquytwnwnsqnmuzphne",
            "eeilfdaookieawrrbvtnqfzcricvhpiv",
            "sisvsjzyrbdsjcwwygdnxcjhzhsxhpceqz",
            "yhouqhjevqxtecomahbwoptzlkyvjexhzcbccusbjjdgcfzlkoqwiwue",
            "hwxxighzvceaplsycajkhynkhzkwkouszwaiuzqcleyflqrxgjsvlegvupzqijbornbfwpefhxekgpuvgiyeudhncv",
            "cpwcjwgbcquirnsazumgjjcltitmeyfaudbnbqhflvecjsupjmgwfbjo",
            "teyygdmmyadppuopvqdodaczob",
            "qaeowuwqsqffvibrtxnjnzvzuuonrkwpysyxvkijemmpdmtnqxwekbpfzs",
            "qqxpxpmemkldghbmbyxpkwgkaykaerhmwwjonrhcsubchs"
        ],
        "usdruypficfbpfbivlrhutcgvyjenlxzeovdyjtgvvfdjzcmikjraspdfp"
    ],
];

foreach ($tests as $test) {
    $res = $re->solution($test[0], $test[1]);
    var_dump($res);
}