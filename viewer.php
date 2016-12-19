<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>image viewer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
	require 'ls.php';

	$files = getFiles();
	
	$file = $_GET['q'];
	$index = array_search($file, $files);
	
	if ($index === FALSE)
	{
		echo 'file not found';
	}
	else
	{
		echo 'Index: ' . $index;
	}
?>

</body>
</html>
