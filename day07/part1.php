<?php

global $total;

function createDir($name, $f, &$dir)
{
    global $total;
    $dir["size"] = 0;
    $dir["name"] = $name;
    // Reading ls
    $line = fgets($f);
    do {
        $line = fgets($f);
        $line = substr($line, 0, strlen($line) - 1);
        if ($line == "$ cd ..") {
            //
        } elseif (substr($line, 0, 3) == "dir") {
            $dir["directories"][substr($line, 4)] = array();
        } elseif (substr($line, 0, 4) == "$ cd") {
            $dir["size"] += createDir(substr($line, 5), $f, $dir["directories"][substr($line, 5)]);
        } else {
            $file = explode(" ", $line);
            $dir["size"] += intval($file[0]);
        }
    } while ((!feof($f)) && ($line != "$ cd .."));

    if ($dir["size"] <= 100000) {
        $total += $dir["size"];
    }

    return $dir["size"];
}

$f = fopen('day7.data', 'r');
$line = fgets($f);
$dir["base"] = array();

$total = 0;
$totalDir = createDir("base", $f, $dir);

echo "part 1 : $total\n";
echo "Total file size (for part 2) : $totalDir\n";
