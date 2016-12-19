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
		$extensions = [ "jpeg", "jpg", "png" ];

		// returns true, if the given file is an image file
		function isImage($file)
		{
			global $extensions;

			$ext = pathinfo($file, PATHINFO_EXTENSION);
			$ext = strtolower($ext);

			return in_array($ext, $extensions);
		}

		// returns a sorted list of all image files in the current working directory
		function getFiles()
		{
			$list = scandir('.');
			$list = array_filter($list, "isImage");
			sort($list);

			return $list;
		}

		$files = getFiles();

		foreach ($files as $file)
		{
			echo "\t\t<li><a href=\"viewer.php?q=" . $file . "\">" . $file . "</a></li>\n";
		}
	?>
	</ul>
</body>
</html>
