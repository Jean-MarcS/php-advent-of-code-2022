<?php

$f = fopen('day4.data', 'r');

$total = 0;
while (!feof($f)) {
    $line = fgets($f);
    $assignment = explode(",", $line);
    $assign0 = explode("-", $assignment[0]);
    $assign1 = explode("-", $assignment[1]);

    // Test
    if (($assign0[0] >= $assign1[0]) && ($assign0[1] <= $assign1[1])) {
        $total++;
    } elseif (($assign0[0] <= $assign1[0]) && ($assign0[1] >= $assign1[1])) {
        $total++;
    }
}
echo "part1 : $total\n";
