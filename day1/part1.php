<?php

$f = fopen('day1.data', 'r');
$maxCal = 0;
$totalElfCal = 0;
while (!feof($f)) {
    $line = fgets($f);
    if (intval(($line) > 0)) { // Line not empty
        $totalElfCal += intval($line);
    } else {
        if ($totalElfCal > $maxCal) {
            $maxCal = $totalElfCal;
        }
        $totalElfCal = 0;
    }
}
if ($totalElfCal > $maxCal) {
    $maxCal = $totalElfCal;
}

echo "part1 : $maxCal\n";
