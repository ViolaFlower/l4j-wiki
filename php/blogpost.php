<?php
$post = $_GET['blogpost'];

$dir = "blogposts";
$blogposts = array_values(array_diff(scandir($dir), array('..', '.')));;

$filename = "$dir/$post/info.json";
$jsonString = file_get_contents($filename);

$decodedData = json_decode($jsonString, true);
$author = $decodedData['Author'];
$jsondate = $decodedData['Date'];
$title = $decodedData['Title'];
$desc = $decodedData['Description'];

$date = date("m/d/Y", strtotime($jsondate));
$writtendate = date("l F jS Y", strtotime($jsondate));


if(!file_exists("$dir/$post")){
header("HTTP/1.0 404 Not Found");
}
if (empty($post)){
header("HTTP/1.0 404 Not Found");
}
?>
<div class="center-screen">
<div class="box">
<p class="back"><a href="?blog">&lt;</a></p>
<hr>
<span class="blogtitle">
<h1><?php echo $title; ?></h1>
<h2><?php echo $desc ?></h2>
<h3><?php echo "Written by $author <i style='font-size:12;color:#3d3d3d'>on $writtendate</i>";
// make author have profile picture
?></h3>
</span>
<hr>
<span class="blogpost"><?php
spl_autoload_register(function($class){
    require str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

use Michelf\Markdown;
$text = file_get_contents("$dir/$post/content.txt");
$html = Markdown::defaultTransform($text);

echo $html;
?></span>
</div>
</div>
