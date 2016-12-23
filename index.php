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

<p><a href="https://github.com/hmfrank/ImgViewR/" target="_blank">source code</a></p>
<p><a href="../">back</a></p>

<style>
	* {
		color: #FFF;
		font-family: sans-serif;
	}

	body {
		text-align: center;
		background-color: #111;
	}

	img {
		margin: 3px;
		border: 0;
		width: 96px;
		height: 96px;
	}

	a:link, a:link * { color: blue; }
	a:visited, a:visited * { color: purple; }
</style>

</body>
</html>
