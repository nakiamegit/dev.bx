<?php
function mathematicalTaskTest()
	{
		$MT = new MathematicalTask();
		$decisionTask = $MT->decisionTask();

		echo 'Результаты тестов: ' . PHP_EOL;
		echo PHP_EOL . 'Not null' . ($decisionTask != NULL ? ' - passed' : ' - failed') . PHP_EOL;
		echo PHP_EOL . 'Not string' . (!is_string($decisionTask) ? ' - passed' : ' - failed') . PHP_EOL;
		echo PHP_EOL . 'Not double' . (!is_double($decisionTask) ? ' - passed' : ' - failed') . PHP_EOL;
	}