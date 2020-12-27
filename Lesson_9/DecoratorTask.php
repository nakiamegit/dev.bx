<?php

interface Shape
{
    public function draw();
}

class Square implements Shape
{
	public function draw(): void
	{
		echo "Shape Square\n";
	}
}

class Circle implements Shape
{
	public function draw(): void
	{
		echo "Shape Circle\n";
	}
}

abstract class ShapeDecorator implements Shape
{
    protected $decoratorShape;

    public function __construct(Shape $decoratorShape)
    {
        $this->decoratorShape = $decoratorShape;
    }

    public function draw()
    {
        $this->decoratorShape->draw();
    }
}

class ColoredShapeDecorator extends ShapeDecorator
{
    public function __construct(Shape $decoratorShape)
    {
        parent::__construct($decoratorShape);
    }

    public function red()
    {
        echo "Red colored ";
        $this->decoratorShape->draw();
    }
    public function green()
    {
        echo "Green colored ";
        $this->decoratorShape->draw();
    }
//    public function draw()
//    {
//        $this->red();
//        $this->decoratorShape->draw();
//    }
}

$redSquare = new ColoredShapeDecorator(new Square);
echo $redSquare->red();

$redCircle = new ColoredShapeDecorator(new Circle);
echo $redCircle->green();

/*
    Немного видоизменил, но также оставил закомментированным вариант,
    который подходил под пример вызова из задания (echo $redSquare->draw();)
 */