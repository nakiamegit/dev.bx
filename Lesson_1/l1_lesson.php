<?php
error_reporting(0);
require_once '../Lesson_1/l1_function.php';

echo '========= Задание 1. Калькулятор =========' . PHP_EOL;
echo 'Для завершения работы оставьте поле пустым и нажмите Enter.' . PHP_EOL;
echo 'Введите число: ';
$input = ReadFromConsole();
$result = 0;
while ($input != NULL){
	$result += $input;
	echo 'Результат: ' . $result . PHP_EOL;
	echo 'Введите число: ';
	$input = ReadFromConsole();

}