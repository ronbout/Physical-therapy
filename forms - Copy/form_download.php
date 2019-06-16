<?php
// uses $_get to create headers for auto-download

if (isset($_GET))
{
	extract($_GET);
	if (isset($fname))
	{
		header('Content-disposition: attachment; filename='.$fname);
		header('Content-type: application/txt');
		readfile($fname);
	}
	else
	{
		exit("No file to download.");
	}
}
else
{
	exit("No file to download.");
}

?>