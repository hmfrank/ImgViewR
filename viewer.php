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
		$file = "file not found";
		$prev = $files[count($files) - 1];
		$next = $files[0];
	}
	else
	{
		$prev = $files[mod($index - 1, count($files))];
		$next = $files[mod($index + 1, count($files))];
	}
?>

<img src="<?php echo urlencode($file) ?>" alt="<?php echo htmlentities($file) ?>" />

<a class="top left" href="viewer.php?q=<?php echo urlencode($prev) ?>"><i></i></a>
<a class="top right" href="viewer.php?q=<?php echo urlencode($next) ?>"><i></i></a>
<a class="bottom left" href="../"><i></i></a>
<a class="bottom right" href="./"><i></i></a>

</body>
</html>
