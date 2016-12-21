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

	function mod($a, $b)
	{
		if ($b <= 0)
		{
			return False;
		}
		else if ($a < 0)
		{
			return $b - (-$a % $b);
		}
		else
		{
			return $a % $b;
		}
	}

	$files = getFiles();
	
	$file = urldecode($_GET['q']);
	$index = array_search($file, $files);
	
	if ($index === FALSE)
	{
		echo "\tFile " . htmlentities($file) . " not found.";
	}
	else
	{
		$prev = $files[mod($index - 1, count($files))];
		$next = $files[mod($index + 1, count($files))];
		
		echo "<!--\n" . $prev . "\n" . $file . "\n" . $next . "\n-->\n";
		
		echo "<a href=\"viewer.php?q=" . urlencode($prev) . "\">prev</a><br/>\n";
		echo "<img src=\"" . urlencode($file) . "\" alt=\"" . htmlentities($file) . "\" /><br/>\n";
		echo "<a href=\"viewer.php?q=" . urlencode($next) . "\">next</a><br/>\n";
	}
?>

</body>
</html>
