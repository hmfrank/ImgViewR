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
		$files = scandir('.');
		sort($files);

		foreach ($files as $file)
		{
			$ext = pathinfo($file, PATHINFO_EXTENSION);
			$ext = strtolower($ext);

			if (in_array($ext, $extensions))
			{
				echo "\t\t<li>" . $file . "</li>\n";
			}
		}
	?>
	</ul>
</body>
</html>
