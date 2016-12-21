<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>image viewer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h1>ImgViewR Sample Galery</h1>

<p>
	<a href="full_res.zip">Download Full Resolution (420 MB)</a><br/>
	<a href="low_res.zip">Download Medium Resolution (42 MB)</a><br/>
</p>

<p><a href="../">back</a></p>

<p>
<?php
	require 'ls.php';

	$files = getFiles();

	foreach ($files as $file)
	{
		echo "\t<a href=\"viewer.php?q=" . urlencode($file) . "\"><img src=\"thumbs/" . urlencode($file) . "\" alt=\"" . htmlentities($file) . " \" /></a>\n";
	}
?>
</p>

<p><a href="../">back</a></p>
<p><a href="https://github.com/hmfrank/" target="_blank"><img src="res/github.png" id="github" alt="source code" /></a></p>

<style>
	* {
		color: white;
		font-family: sans-serif;
	}

	body {
		text-align: center;
		background-color: #0E0E0E;
	}

	img {
		margin: 3px;
		border: 0;
		width: 96px;
		height: 96px;
	}
	
	#github {
		width: 48px;
		height: 48px;
	}

	a:link, a:link * { color: blue; }
	a:visited, a:visited * { color: purple; }
</style>

</body>
</html>

<!-- TODO: resize github icon -->
