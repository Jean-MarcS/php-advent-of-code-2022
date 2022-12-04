<?php

$f = fopen('day3.data', 'r');


$priority = 0;
$cpt = 1;
while (!feof($f)) {
    $line1 = fgets($f);
    $line2 = fgets($f);
    $line3 = fgets($f);
    // Check wich caracters is in all
    for ($i = 0; $i < strlen($line1); $i++) {
        if ((strpos($line2, $line1[$i]) !== false) && (strpos($line3, $line1[$i]) !== false)) {
            $found = $line1[$i];
            break;
        }
    }
    if (ord($found) <= 90) {
        $priority += ord($found) - 38;
    } else {
        $priority += ord($found) - 96;
    }
    echo "$cpt: " . ord($found) . " $found\n";
    $cpt++;
}
echo "part2 : $priority\n";
