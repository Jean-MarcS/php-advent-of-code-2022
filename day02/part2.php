<?php

$f = fopen('day2.data', 'r');
$score['A X'] = 3;
$score['A Y'] = 4;
$score['A Z'] = 8;
$score['B X'] = 1;
$score['B Y'] = 5;
$score['B Z'] = 9;
$score['C X'] = 2;
$score['C Y'] = 6;
$score['C Z'] = 7;

$total = 0;
while (!feof($f)) {
    $line = substr(fgets($f), 0, 3);
    $total += $score[$line];
}
echo "part2 : $total\n";
