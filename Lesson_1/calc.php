<?php
error_reporting(0);
require_once '../Lesson_1/readFromConsole.php';

echo '========= Задание 1. Калькулятор =========' . PHP_EOL;
echo 'Для завершения работы оставьте поле пустым и нажмите Enter.' . PHP_EOL;
echo 'Введите число: ';
$input = readFromConsole();
$result = 0;
while ($input != NULL)
{
    $result += $input;
    echo 'Результат: ' . $result . PHP_EOL;
    echo 'Введите число: ';
    $input = readFromConsole();
}