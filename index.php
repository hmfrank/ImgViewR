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
<p>
	<a href="../">back</a>
</p>

<ul>
<?php
	require 'ls.php';

	$files = getFiles();

	foreach ($files as $file)
	{
		echo "\t<li><a href=\"viewer.php?q=" . urlencode($file) . "\">" . htmlentities($file) . "</a></li>\n";
	}
?>
</ul>

<p>
	<a href="https://github.com/hmfrank/" target="_blank">source code</a>
</p>

</body>
</html>
