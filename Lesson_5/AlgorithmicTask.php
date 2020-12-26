<?php
require_once 'readFromConsole.php';

class Chess
{
	public function rookChess($arrChess = [])
	{
		if($arrChess != NULL)
        {
            $startCol = $arrChess[0];
            $startRow = $arrChess[1];
            $endCol = $arrChess[2];
            $endRow = $arrChess[3];
        }
		else
        {
            $startCol = readFromConsole('Введите начальный номер столбца');
            $startRow = readFromConsole('Введите начальный номер строки');
            $endCol = readFromConsole('Введите конечный номер столбца');
            $endRow = readFromConsole('Введите конечный номер строки');
        }

		if($startCol === '' || $startRow === '' || $endCol === '' || $endRow === '')
		{
            $result = 'Пустые значения совершенно не годятся! Попробуйте ещё раз!';
		}
		elseif(!is_integer($startCol) || !is_integer($startRow) || !is_integer($endCol) || !is_integer($endRow))
		{
            $result = 'Пожалуйста вводите только целые числа!';
		}
		elseif ($startCol <= 0 || $startRow <= 0 || $endCol <= 0 || $endRow <= 0)
		{
            $result = 'Отсчёт в шахматной доске начинается с 1!';
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
            $result = 'Не забывайте, что на шахматной доске 8 строк и 8 столбцов!';
		}
	   return $result;
	}
}