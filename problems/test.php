<?php

$stack = [1,2,3,4,5,6];

$end = end($stack);

$lastTwo = array_slice($stack, -2, 1);
var_dump($end, $lastTwo);