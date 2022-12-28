<?php

$f = fopen('day8.data', 'r');
$cpt = 0;
$total = 0;
while (!feof($f)) {
    $line[$cpt] = fgets($f);
    $cpt++;
}

// horizontal left to right
for ($l = 0; $l < 99; $l++) {
    $min = $line[$l][0];
    $total++;
    for ($c = 1; $c < 99; $c++) {
        if ($line[$l][$c] > $min) {
            $min = $line[$l][$c];
            if (empty($visible[$l][$c])) {
                $total++;
                $visible[$l][$c] = 1;
            }
        }
    }
}

// horizontal right to left
for ($l = 0; $l < 99; $l++) {
    $min = $line[$l][98];
    $total++;
    for ($c = 97; $c >= 0; $c--) {
        if ($line[$l][$c] > $min) {
            $min = $line[$l][$c];
            if (empty($visible[$l][$c])) {
                $total++;
                $visible[$l][$c] = 1;
            }
        }
    }
}


// vertical top to bottom
for ($c = 1; $c < 98; $c++) {
    $min = $line[0][$c];
    if (empty($visible[0][$c])) {
        $total++;
        $visible[0][$c] = 1;
    }
    for ($l = 1; $l < 99; $l++) {
        if ($line[$l][$c] > $min) {
            $min = $line[$l][$c];
            if (empty($visible[$l][$c])) {
                $total++;
                $visible[$l][$c] = 1;
            }
        }
    }
}
echo ("p3 = $total\n");
// vertical bottom to top
for ($c = 1; $c < 97; $c++) {
    $min = $line[98][$c];
    if (empty($visible[98][$c])) {
        $total++;
        $visible[98][$c] = 1;
    }
    for ($l = 97; $l >= 0; $l--) {
        if ($line[$l][$c] > $min) {
            $min = $line[$l][$c];
            if (empty($visible[$l][$c])) {
                $total++;
                $visible[$l][$c] = 1;
            } else {
                echo "visible\n";
            }
        }
    }
    echo ("$c = $total\n");
}

echo "part 1 : $total\n";
