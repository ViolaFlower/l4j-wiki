<div class="center-screen">
<div class="box">
<p class="back"><a href="./">&lt;</a></p>
<hr>
<?php
$dir = "blogposts";
$blogposts = array_values(array_diff(scandir($dir, SORT_LOCALE_STRING), array('..', '.')));

function sortByDate($a, $b) {
    global $dir;
    $filenameA = "$dir/$a/info.json";
    $filenameB = "$dir/$b/info.json";

    $jsonStringA = file_get_contents($filenameA);
    $jsonStringB = file_get_contents($filenameB);

    $decodedDataA = json_decode($jsonStringA, true);
    $decodedDataB = json_decode($jsonStringB, true);

    $dateA = strtotime($decodedDataA['Date']);
    $dateB = strtotime($decodedDataB['Date']);

    return $dateB - $dateA;
}

usort($blogposts, 'sortByDate');

foreach($blogposts as $blogs){
    $filename = "$dir/$blogs/info.json";
    $jsonString = file_get_contents($filename);

    $decodedData = json_decode($jsonString, true);
    $author = $decodedData['Author'];
    $jsondate = $decodedData['Date'];
    $title = $decodedData['Title'];
    $desc = $decodedData['Description'];

    $date = date("m/d/Y", strtotime($jsondate));

    echo "<div class='blogdiv'><a href='?blogpost=$blogs'><img class='blogicon' src='$dir/$blogs/icon.png'>
    $author<br>
    $title<br>
    <span id='desc'>$desc<br></span>
    $date<br>
    </a></div><br>";
}
?>
</div>
</div>
