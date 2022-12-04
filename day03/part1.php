<?php

$f = fopen('day3.data', 'r');


$priority = 0;
while (!feof($f)) {
    $line = fgets($f);
    // Get both rucksack parts
    $first = substr($line, 0, (strlen($line) / 2));
    $second = substr($line, (strlen($line) / 2));
    // Check wich caracters is in both
    for ($i = 0; $i < strlen($first); $i++) {
        if (strpos($second, $first[$i]) !== false) {
            $found = $first[$i];
            break;
        }
    }
    if (ord($found) <= 90) {
        $priority += ord($found) - 38;
    } else {
        $priority += ord($found) - 96;
    }
    echo ord($found) . " $found\n";
}
echo "part1 : $priority\n";
