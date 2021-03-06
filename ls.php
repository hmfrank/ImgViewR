<?php

$extensions = [ 'jpeg', 'jpg', 'png'];

// returns true, if the given file is an image file
function isImage($file)
{
	global $extensions;

	$ext = pathinfo($file, PATHINFO_EXTENSION);
	$ext = strtolower($ext);

	return in_array($ext, $extensions);
}

// returns a list of all image files in the current working directory
function getFiles()
{
	$list = scandir('.');
	$list = array_filter($list, 'isImage');
	sort($list);

	return $list;
}

?>
