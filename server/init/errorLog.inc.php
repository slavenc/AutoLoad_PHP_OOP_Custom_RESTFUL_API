<?php

function errorLog($value) {
    $realMessage = print_r($value, true);
    $myfile = fopen("error.txt", "a") or die("Unable to open file!");
    fwrite($myfile, $realMessage);
    fclose($myfile);
}
