<?php
    $files = glob($_SERVER['DOCUMENT_ROOT'].'/ads' . '/*.*');
    $file = array_rand($files);
$img = $files[$file];
header('Content-Type: image/jpeg');
readfile($img);
?>
