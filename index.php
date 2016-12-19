<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>image viewer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h1>ImgViewR Sample Galery</h1>

	<ul>
<?php
		require 'ls.php';

		$files = getFiles();

		foreach ($files as $file)
		{
			echo "\t\t<li><a href=\"viewer.php?q=" . $file . "\">" . $file . "</a></li>\n";
		}
	?>
	</ul>
</body>
</html>
