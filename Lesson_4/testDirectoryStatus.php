<?php
interface ITestable
{
	public function getTestCount();
	public function runTest();
}

class Tests
{
	public static function run(ITestable $class)
	{
		echo 'Count: ' . $class->getTestCount();
		$class->runTest();
	}
}