<?php
header('Content-Type:text/plain');

require 'ls.php';

// delete cache file
if (unlink(CACHE_FILE))
{
	echo 'Deleted ' . CACHE_FILE . "\n";
}
else
{
	echo "Can't delete " . CACHE_FILE  . ".\n";
}

// create new one
$list = readDirectory();
writeCache($list);

echo "Wrote new cache file " . CACHE_FILE . " with the following contents:\n\n";

foreach ($list as $file)
{
	echo $file . "\n";
}

?>
