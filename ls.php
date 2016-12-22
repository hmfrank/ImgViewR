<?php

define('CACHE_FILE', '/dev/shm/imgviewr_cache.txt');
$extensions = [ 'jpeg', 'jpg', 'png'];

// returns true, if the given file is an image file
function isImage($file)
{
	global $extensions;

	$ext = pathinfo($file, PATHINFO_EXTENSION);
	$ext = strtolower($ext);

	return in_array($ext, $extensions);
}

// returns the array stored in the cache file, or FALSE on failure
function readCache()
{
	if (is_readable(CACHE_FILE))
	{
		return file(CACHE_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	}
	else
	{
		return FALSE;
	}
}

// returns a list of all image files in the current working directory
function readDirectory()
{
	$list = scandir('.');
	$list = array_filter($list, 'isImage');
	sort($list);
	
	return $list;
}

// writes the given array to the cache file
function writeCache($list)
{
	$string = implode("\n", $list);
	file_put_contents(CACHE_FILE, $string);
}

// returns a sorted list of all image files in the current working directory
function getFiles()
{
	$list = readCache();
	
	if ($list === FALSE)
	{
		$list = readDirectory();
		writeCache($list);
	}
	
	return $list;
}

?>
