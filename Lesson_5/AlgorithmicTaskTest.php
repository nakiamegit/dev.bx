<?php
function algorithmicTaskTest()
{
	$AT = new Chess();
	$rookChess = $AT->rookChess();

	echo PHP_EOL . 'Результаты тестов: '.PHP_EOL;
	echo 'Not null'.($rookChess != null ? ' - passed' : ' - failed') . PHP_EOL;
	echo 'Not numeric'.(!is_numeric($rookChess) ? ' - passed' : ' - failed') . PHP_EOL;
}