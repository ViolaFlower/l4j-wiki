<?php
$test = 0;
?>
<head>
<title>L4J Wiki</title>
<link rel="stylesheet" href="style.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- get the l4j icon for the tabicon -->
<link rel="icon" href="favicon.ico">

<meta content="Legacy 4J Wiki Page" property="og:title" />
<meta content="The Official Wiki For Legacy 4J" property="og:description" />
<meta content="/misc/media/embeds/main.png" property="og:image" />
<!-- change this to l4j server icon main color -->
<meta content="#841710" data-react-helmet="true" name="theme-color" />

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
