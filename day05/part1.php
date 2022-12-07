<?php

function swapCrate($total, &$crateFrom, &$crateTo)
{
    for ($i = 1; $i <= $total; $i++) {
        if (strlen($crateFrom) > 0) {
            $crateTo .= substr($crateFrom, -1);
            $crateFrom = substr($crateFrom, 0, strlen($crateFrom) - 1);
        }
    }
}

$f = fopen('day5.data', 'r');
$crate[1] = "HBVWNMLP";
$crate[2] = "MQH";
$crate[3] = "NDBGFQML";
$crate[4] = "ZTFQMWG";
$crate[5] = "MTHP";
$crate[6] = "CBMJDHGT";
$crate[7] = "MNBFVR";
$crate[8] = "PLHMRGS";
$crate[9] = "PDBCN";

$total = 0;
while (!feof($f)) {
    $line = fgets($f);
    $move = explode(" ", $line);
    swapCrate(intval($move[1]), $crate[intval($move[3])], $crate[intval($move[5])]);
}

echo "part1 : $total\n";
var_dump($crate);
