<?php
include 'AlgorithmicTask.php';

class AlgorithmicTaskTest extends Chess
{
    public function notNumericTest()
    {
        $AT = new Chess();
        $rookChess = $AT->rookChess([1, 1, 'test', 1]);
        echo 'Результаты тестов: ' . PHP_EOL;
        echo 'Not numeric'.($rookChess == 'Пожалуйста вводите только целые числа!' ? ' - passed' : ' - failed') . PHP_EOL;
    }

    public function limitColTest()
    {
        $AT = new Chess();
        $rookChess = $AT->rookChess([9, 1, 1, 1]);
        echo 'limitCol'.($rookChess == 'Не забывайте, что на шахматной доске 8 строк и 8 столбцов!' ? ' - passed' : ' - failed') . PHP_EOL;
    }

    public function limitRowTest()
    {
        $AT = new Chess();
        $rookChess = $AT->rookChess([1, 9, 1, 1]);
        echo 'limitRow'.($rookChess == 'Не забывайте, что на шахматной доске 8 строк и 8 столбцов!' ? ' - passed' : ' - failed') . PHP_EOL;
    }

    public function tryTest()
    {
        $AT = new Chess();
        $rookChess = $AT->rookChess([2, 4, 2, 6]);
        echo 'tryTest'.($rookChess == 'Ответ: Да! Вы действительно можете сделать этот ход!' ? ' - passed' : ' - failed') . PHP_EOL;
    }
}

$test = new AlgorithmicTaskTest();
    $test->notNumericTest();
    $test->limitColTest();
    $test->limitRowTest();
    $test->tryTest();
