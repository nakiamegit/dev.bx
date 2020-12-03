<?php
require_once 'readFromConsole.php';
include 'MathematicalTaskTest.php';

# Задание 1
# Последовательность состоит из натуральных чисел и завершается командой stop.
# Всего вводится не более 20 чисел.
# Определите, сколько элементов этой последовательности равны ее наибольшему элементу.


class MathematicalTask
{

	public function decisionTask()
	{
		echo '=======================	Mathematical task	=======================' . PHP_EOL;
		echo 'Настоящий скрипт позволяет определить сколько элементов' . PHP_EOL . 'введенной Вами последовательности натуральных чисел равны её наибольшему элементу.' . PHP_EOL;
		echo 'Максимальное число элементов - 20.' . PHP_EOL;

		$dataArray = array();
		$input = readFromConsole('Введите число');

		while (true)
		{
			#  Количество значений в массиве
			$countArray = count($dataArray);

			# Проверяем не превысил ли массив 20 значений
			if($countArray === 19)
			{
				# Проверяем тип данных последнего допустимого числа
				if(is_integer($input))
				{
					$dataArray[] = $input;
					break;
				}
			}
			elseif (is_double($input))
			{
				echo 'Неверный формат данных. Попробуйте снова!' . PHP_EOL;
			}
			elseif ($input === 0)
			{
				echo 'Нуль не является натуральным числом!' . PHP_EOL;
			}
			# Если пользователь ввел команду 'stop'
			elseif ($input === 'stop')
			{
				break;
			}
			# Если пользователь ввёл число, запишем значение в массив
			elseif(is_integer($input))
			{
				$dataArray[] = $input;
			}
			# Иначе завершим выполнение
			else
			{
				echo 'Неверный формат данных. Попробуйте снова!' . PHP_EOL;
			}

			# Вызываем функцию повторно
			$input = readFromConsole('Введите следующее число или \'stop\' для завершения работы');
		}

		$arrayMax = max($dataArray);
		$i = 0;
		foreach ($dataArray as $value)
		{
			($value == $arrayMax ? $i++ : '');
		}
		echo 'Ваш результат равен: ' . $i . PHP_EOL;
		echo '*******   Разработчики 2020   *******';
		return $i;
	}
}

$MT = new MathematicalTask();
$decisionTask = $MT->decisionTask();

# mathematicalTaskTest();