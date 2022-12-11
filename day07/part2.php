<?php

global $minSize;

function createDir($name, $f, &$dir, $needed)
{
    global $minSize;
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
            $dir["size"] += createDir(substr($line, 5), $f, $dir["directories"][substr($line, 5)], $needed);
        } else {
            $file = explode(" ", $line);
            $dir["size"] += intval($file[0]);
        }
    } while ((!feof($f)) && ($line != "$ cd .."));
    if (($dir["size"] >= $needed) && ($dir["size"] < $minSize)) {
        $minSize = $dir["size"];
    }

    return $dir["size"];
}

$f = fopen('day7.data', 'r');
$line = fgets($f);
$dir["base"] = array();

$freeSpace = 70000000 - 41072511;
$minSize = 30000000;
$nedeed =  $minSize - $freeSpace;
createDir("base", $f, $dir, $nedeed); // found on part 1

echo "part 2 : $minSize\n";
