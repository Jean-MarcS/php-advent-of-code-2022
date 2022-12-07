<?php

function swapCrate($total, &$crateFrom, &$crateTo)
{

    if (strlen($crateFrom) >= $total) {
        //$moved = substr($crateFrom, strlen($crateFrom)-$total);
        $crateTo .= substr($crateFrom, strlen($crateFrom) - $total);
        $crateFrom = substr($crateFrom, 0, strlen($crateFrom) - $total);
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

echo "part2 : \n";
var_dump($crate);
