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

	// mod function that also works for negative numbers, too
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

<a href="<?php echo urlencode($file) ?>"><img src="low/<?php echo urlencode($file) ?>" alt="<?php echo htmlentities($file) ?>" /></a>

<a class="top left" href="viewer.php?q=<?php echo urlencode($prev) ?>"><i></i></a>
<a class="top right" href="viewer.php?q=<?php echo urlencode($next) ?>"><i></i></a>
<a class="bottom left" href="../"><i></i></a>
<a class="bottom right" href="./"><i></i></a>

<style>
	* {
		margin: 0;
		padding: 0;
		border: 0;
		
		color: white;
		font-family: sans-serif;
	}

	body {
		background-color: #0E0E0E;
		text-align: center;
	}
	
	img {
		position: fixed;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
		max-width: 100%;
		max-height: 100%;

		z-index: -1;
	}
	
	.top, .bottom {
		display: block;
		position: fixed;

		cursor: pointer;
	}

	.top {
		top: 0;
		bottom: 48px;
	}

	.bottom {
		bottom: 0;
		height: 48px;
	}

	.left { left: 0; }
	.right { right: 0; }

	.left, .right {
		width: 5%;
		min-width: 48px;
	}

	.top i, .bottom i {
		display: block;
		margin-left: auto;
		margin-right: auto;

		width: 48px;
		height: 48px;

		background-image: url("/res/icons.png");
		background-repeat: no-repeat;
		background-size: auto auto;
	}

	.top.left i { background-position: 0px 0px; }
	.top.right i { background-position: -48px 0px; }
	.bottom.left i { background-position: -96px 0px; }
	.bottom.right i { background-position: -144px 0px; }
</style>

</body>
</html>

<!-- TODO: Navigations icons huebscher machen -->
<!-- TODO: mit Pfeiltasten navigieren -->
