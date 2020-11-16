<?php
/*
 	* 		======== Функция тестирования =======
	* 		Входные параметры:
	* readFromConsole('', 'true') - true;
	* readFromConsole('', 'false') - false;
	* readFromConsole('', '!stop') - null;
	* readFromConsole('', '1.3') - 1.3;
	* readFromConsole('', '1') - 1;
*/
function TDD() {

	$result = readFromConsole('readFromConsole(true)', 'true');
	echo var_export($result) . ($result === true ? ' - passed' : ' - failed') . PHP_EOL;

	$result = readFromConsole('readFromConsole(false)', 'false');
	echo var_export($result) . ($result === false ? ' - passed' : ' - failed') . PHP_EOL;

	$result = readFromConsole('readFromConsole(!stop)', '!stop');
	echo var_export($result) . ($result === NULL ? ' - passed' :  - 'failed') . PHP_EOL;

	$result = readFromConsole('readFromConsole(1.3)', '1.3');
	echo var_export($result) . ($result === 1.3 ? ' - passed' : ' - failed') . PHP_EOL;

	$result = readFromConsole('readFromConsole(1)', '1');
	echo var_export($result) . ($result === 1 ? ' - passed' : ' - failed') . PHP_EOL;
}