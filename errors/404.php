<?php
header("Content-type: text/plain");

$url =  $_SERVER['REQUEST_URI']; 
$url = str_replace('%20', ' ', $url);

echo "404 Not Found\n$url";

die();
?>
