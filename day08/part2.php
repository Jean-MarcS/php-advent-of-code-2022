<?php

function testView($line, $posl, $posc)
{

    $right = 0;
    $left = 0;
    $up = 0;
    $down = 0;
    $height = $line[$posl][$posc];

    // horizontal right
    $l = $posl;
    for ($c = $posc + 1; $c < 99; $c++) {
        if ($line[$l][$c] < $height) {
            $right++;
        }
        if ($line[$l][$c] >= $height) {
            $right++;
            break;
        }
    }


    // horizontal left
    for ($c = $posc - 1; $c >= 0; $c--) {
        if ($line[$l][$c] < $height) {
            $left++;
        }
        if ($line[$l][$c] >= $height) {
            $left++;
            break;
        }
    }

    // vertical down
    $c = $posc;
    for ($l = $posl + 1; $l < 99; $l++) {
        if ($line[$l][$c] < $height) {
            $down++;
        }
        if ($line[$l][$c] >= $height) {
            $down++;
            break;
        }
    }

    // vertical up
    $c = $posc;
    for ($l = $posl - 1; $l >= 0; $l--) {
        if ($line[$l][$c] < $height) {
            $up++;
        }
        if ($line[$l][$c] >= $height) {
            $up++;
            break;
        }
    }

    return $down * $up * $right * $left;
}


$f = fopen('day8.data', 'r');
$cpt = 0;
while (!feof($f)) {
    $line[$cpt] = fgets($f);
    $cpt++;
}

$max = 0;
for ($l = 0; $l < 99; $l++) {
    for ($c = 0; $c < 99; $c++) {
        $val = testView($line, $l, $c);
        if ($val > $max) {
            $max = $val;
        }
    }
}
echo "part 2 : $max\n";
