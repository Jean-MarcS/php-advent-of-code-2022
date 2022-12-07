<?php

function testGroup($group)
{
    $found = false;
    for ($i = 0; $i < 14; $i++) {
        for ($j = 0; $j < 14; $j++) {
            if (($j != $i) && ($group[$j] == $group[$i])) {
                $found = true;
                break 2;
            }
        }
    }
    return $found;
}

$f = fopen('day6.data', 'r');

$total = 0;
$line = fgets($f);

for ($i = 0; $i < strlen($line) - 14; $i++) {
    if (!testGroup(substr($line, $i, 14))) {
        echo "part2 : " . ($i + 14) . "\n";
        break;
    }
}
