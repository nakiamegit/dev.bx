<?php
require_once 'l2_functionTest.php';
function readFromConsole(string $data, $input)
{
	echo $data . ': ';
	if ($input === 'true'){
		$input = true;
	} elseif ($input === 'false'){
		$input = false;
	} elseif ($input == '!stop'){
		$input = NULL;
	} elseif (is_numeric($input)){
		$input = +$input;
	} else {
		$input = (string)$input;
	}
	return $input;
}
TDD();