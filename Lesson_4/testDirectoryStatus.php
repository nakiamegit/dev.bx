<?php
interface ITestable
{
	public function runTest();
}

class Tests
{
	public static function run(ITestable $class)
	{
		$class->runTest();
	}
}