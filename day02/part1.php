<?php

$f = fopen('day2.data', 'r');
$score['A X'] = 4;
$score['A Y'] = 8;
$score['A Z'] = 3;
$score['B X'] = 1;
$score['B Y'] = 5;
$score['B Z'] = 9;
$score['C X'] = 7;
$score['C Y'] = 2;
$score['C Z'] = 6;

$total = 0;
while (!feof($f)) {
    $line = substr(fgets($f), 0, 3);
    $total += $score[$line];
}
echo "part1 : $total\n";
