<?php
$test = 0;
?>
<head>
<title>Re-Console</title>
<link rel="stylesheet" href="style.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico">

<meta content="Re-Console Wiki" property="og:title" />
<meta content="The Official Wiki For Re-Console" property="og:description" />
<meta content="/misc/media/embeds/main.png" property="og:image" />
<meta content="#841710" data-react-helmet="true" name="theme-color" />

<link rel="preload" as="image" href="assets/button_highlighted.png">
<link rel="preload" as="image" href="assets/button.png">
<link rel="preload" as="audio" href="assets/click.mp3">
<link rel="preload" as="audio" href="assets/hover.mp3">


<script src="sound.js"></script>

<audio id="hover">
<source src="assets/hover.mp3" type="audio/mpeg">
</audio>

<audio id="click">
<source src="assets/click.mp3" type="audio/mpeg">
</audio>

</head>
<div class="blur">
<?php if (isset($_GET['credits'])){
  $test = 1;
include ("php/credits.php");
}

if (isset($_GET['blog'])){
  $test = 1;
include ("php/blog.php");
}

if (isset($_GET['blogpost'])){
  $test = 1;
include ("php/blogpost.php");
}

if (isset($_GET['wiki'])){
  $test = 1;
  include ("php/wiki.php");
}

if ($test == 0) {
include ("php/main.php");
}
?>
</div>

<script>
console.log("i see you!")
console.log("if you want to help email me at mail@novassite.net")
</script>
