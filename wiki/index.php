<head>
<?php
$file = $_GET['page'];
if (empty($file)) {
    $file = "Home";
}
?>
<title><?php echo $file;?></title>
<link rel="stylesheet" href="style.css">
<!-- Begin google font code -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<!-- end google font code -->

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<h1><a href="/">Back</a></h1>
<hr>
<div class="mainbody">
<?php


spl_autoload_register(function($class){
    require '../'.str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

use Michelf\Markdown;
$text = file_get_contents("$file.md");
$html = Markdown::defaultTransform($text);

echo $html;
?>
</div>


<div class="shitfuck">
<?php
$dir    = './';

$flies = array_values(array_diff(scandir($dir), array('..', '.', 'index.php', 'style.css','README.md')));

for ($i = 0; $i < count($flies); $i++) {
    sort($flies, SORT_NATURAL | SORT_FLAG_CASE);
    // Specify the file path
    $file_path = $flies[$i];
    $file_display = str_replace('.md','',$flies[$i]);

    // Display the filename
    echo "<details><summary style='cursor:pointer;'><a href='?page=$file_display'>$file_display</a> </summary>";

    // Open the file for reading
    $file = fopen($file_path, "r");

    // Check if file opening was successful
    if ($file) {
        // Read the file line by line until the end of file
        while (($line = fgets($file)) !== false) {
            // Check if the line starts with "##" or "#"
            if (substr(trim($line), 0, 2) === "##") {
                // Display the line in bold
                echo "<b>".str_replace('#','',$line)."</b><br>";
            } elseif (substr(trim($line), 0, 1) === "#") {
                // Display the line italicized
                echo "<i>".str_replace('#','',$line)."</i><br>";
            }
        }
        echo "</details>";

        // Close the file
        fclose($file);
    } else {
        // Display an error message if file opening failed
        echo "Failed to open the file: $file_path<br>";
    }
}
?>
</div>
