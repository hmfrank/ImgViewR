<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>image viewer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<img alt="" id="main" onclick="show()" />

<div class="top left" onclick="prev()"><i></i></div>
<div class="top right" onclick="next()"><i></i></div>
<a class="bottom left" href="../"><i></i></a>
<a class="bottom right" href="./"><i></i></a>

<noscript>
	<p>JAVASCRIPT AN MACHEN DU HURENSOHN!!!</p>
	<p>If you don't mind, I would politely ask you to enable Javascript, please.</p>
</noscript>

<script>
	var list = <?php require 'ls.php'; echo json_encode(getFiles()); ?>;
	var file;

	function refresh()
	{
		document.getElementById("main").setAttribute("src", "low/" + encodeURI(file));
		document.getElementById("main").setAttribute("alt", encodeURI(file));
		window.location.hash = encodeURI(file);
	}

	function hashchange(e)
	{
		file = undefined;

		if (window.location.hash)
			file = decodeURI(window.location.hash.substring(1));

		if (list.indexOf(file) < 0)
		{
			file = list[0];
			window.location.hash = encodeURI(file);
		}

		refresh();
	}

	function getnextprev(file, next)
	{
		var index = list.indexOf(file);

		index = next ? index + 1 : index - 1;

		if (index < 0) index = list.length - 1;
		else if (index >= list.length) index = 0;

		return list[index];
	}

	function prev()
	{
		file = getnextprev(file, false);
		refresh();
	}

	function next()
	{
		file = getnextprev(file, true);
		refresh();
	}

	function show()
	{
		window.location.href = encodeURI(file);
	}

	window.addEventListener("hashchange", hashchange);
	hashchange(null);
	
	document.onkeydown = function keydown(e)
	{
		if (e.keyCode == '37') prev();
		else if (e.keyCode == '39') next();
	};
</script>

<style>
	* {
		margin: 0;
		padding: 0;
		border: 0;

		color: #FFF;
		font-family: sans-serif;
	}

	body {
		background-color: #111;
		text-align: center;
	}

	noscript p {
		margin-bottom: 1em;

		color: #F00;
		font-size: xx-large;
		font-weight: bold;
	}

	#main {
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

		background-image: url("res/icons.png");
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
