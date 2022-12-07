<?php

function testGroup($group)
{
    $found = false;
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
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

for ($i = 0; $i < strlen($line) - 4; $i++) {
    if (!testGroup(substr($line, $i, 4))) {
        echo "part1 : " . ($i + 4) . "\n";
        break;
    }
}
