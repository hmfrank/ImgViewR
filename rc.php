<?php
header('Content-Type:text/plain');

require 'ls.php';

if (unlink(CACHE_FILE))
{
	echo 'Deleted ' . CACHE_FILE . "\n";
	
	$list = getFiles();
	
	echo 'Created ' . CACHE_FILE . " with the following contents:\n\n";
	foreach ($list as $file)
	{
		echo $file . "\n";
	}
}
else
{
	echo "Can't delete " . CACHE_FILE  . ".\n";
}

?>
