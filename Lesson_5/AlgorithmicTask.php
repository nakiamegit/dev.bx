<?php
require_once 'readFromConsole.php';
include 'AlgorithmicTaskTest.php';

class Chess
{

	public function rookChess()
	{
		echo '=======================	Algorithmic task	=======================' . PHP_EOL;
		echo 'Настоящий скрипт позволяет определить может ли шахматная ладья' . PHP_EOL . 'двигаться на любое число полей по горизонтали или по вертикали' . PHP_EOL . 'при условии,что на её пути нет фигур.' . PHP_EOL;

		$startCol = readFromConsole('Введите начальный номер столбца');
		$startRow = readFromConsole('Введите начальный номер строки');
		$endCol = readFromConsole('Введите конечный номер столбца');
		$endRow = readFromConsole('Введите конечный номер строки');

		if($startCol === '' || $startRow === '' || $endCol === '' || $endRow === '')
		{
			echo 'Пустые значения совершенно не годятся! Попробуйте ещё раз!';
		}
		elseif(!is_integer($startCol) || !is_integer($startRow) || !is_integer($endCol) || !is_integer($endRow))
		{
			echo 'Пожалуйста вводите только целые числа!' . PHP_EOL;
		}
		elseif ($startCol === 0 || $startRow === 0 || $endCol === 0 || $endRow === 0)
		{
			echo 'Отсчёт в шахматной доске начинается с 1 ^_-';
		}
		elseif($startCol <= 8 && $startRow <= 8 && $endCol <= 8 && $endRow <= 8)
		{
			if($startCol === $endCol)
			{
				$result = 'Ответ: Да! Вы действительно можете сделать этот ход!';
			}
			elseif ($startRow === $endRow)
			{
				$result = 'Ответ: Да! Вы действительно можете сделать этот ход!';
			}
			else
			{
				$result = 'Ответ: Нет! Так ходить запрещено!';
			}
		}
		else
		{
			echo 'Не забывайте, что на шахматной доске 8 строк и 8 столбцов!' . PHP_EOL;
		}
		echo $result; return $result;
	}
}

$AT = new Chess();
$rookChess = $AT->rookChess();

# $test = algorithmicTaskTest();