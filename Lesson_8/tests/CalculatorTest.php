<?php
//CalculatorTest.php
use \PHPUnit\Framework\TestCase;
require_once (__DIR__ . '/../lib/Calculator.php');

class CalculatorTest extends TestCase
{
	public function testAdd(): void
	{
		$calculator = new Calculator();
		self::assertEquals(4, $calculator->add(2, 2));
	}

    public function testSubtract(): void
    {
        $calculator = new Calculator();
        self::assertEquals(2, $calculator->subtract(4, 2));
    }

    public function testMultiply(): void
    {
        $calculator = new Calculator();
        self::assertEquals(4, $calculator->multiply(2, 2));
    }

    public function testDivide(): void
    {
        $calculator = new Calculator();
        self::assertEquals(3, $calculator->divide(9, 3));
    }

	public function testDivideException(): void
    {
        $calculator = new Calculator();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Divider cant be a zero');
        $calculator->divide(5,0);
    }

    public function testDegree(): void
    {
        $calculator = new Calculator();
        self::assertEquals(27, $calculator->degree(3, 3));
    }

    public function testSquare(): void
    {
        $calculator = new Calculator();
        self::assertEquals(3, $calculator->square(9));
    }

    public function testSquareException(): void
    {
        $calculator = new Calculator();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot root out negative number');
        $calculator->square(-9);
    }
}


