<?php

$f = fopen('day1.data', 'r');
$maxCal = [];
$totalElfCal = 0;
while (!feof($f)) {
    $line = fgets($f);
    if (intval(($line) > 0)) { // Line not empty
        $totalElfCal += intval($line);
    } else {
        $maxCal[] = $totalElfCal;
        $totalElfCal = 0;
    }
}
if ($totalElfCal > $maxCal) {
    $maxCal = $totalElfCal;
}
rsort($maxCal);

echo "part2 : " . ($maxCal[0] + $maxCal[1] + $maxCal[2]) . "\n";
