<?php
function readFromConsole(string $text)
{
	echo $text . ': ';
	$data = trim(fgets(STDIN));
	if ($data === 'true' || $data === 'false')
	{
		$data = (bool)$data;
	}
	elseif (is_numeric($data))
	{
		$data = +$data;
	}
	else
	{
		$data = (string)$data;
	}
	return $data;
}