<?php
include 'MathematicalTask.php';

class MathematicalTaskTest extends MathematicalTask
{
    public function notNullTest()
    {
        $MT = new MathematicalTask();
        $decisionTask = $MT->decisionTask([4,7,8]);
        echo 'Результаты тестов: ' . PHP_EOL;
        echo 'Not null' . ($decisionTask != NULL ? ' - passed' : ' - failed') . PHP_EOL;
    }
    public function tryTest()
    {
        $MT = new MathematicalTask();
        $decisionTask = $MT->decisionTask([2, 3, 3, 2, 1, 1, 2]);
        echo 'Try' . ($decisionTask == 2 ? ' - passed' : ' - failed') . PHP_EOL;
    }
}

$test = new MathematicalTaskTest();
    $test->notNullTest();
    $test->tryTest();