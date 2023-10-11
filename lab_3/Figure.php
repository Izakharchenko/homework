<?php

namespace figure;

abstract class Figure
{
    abstract public function area();
    abstract public function center($x, $y);
}

class Circle extends Figure
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function area()
    {
        return M_PI * pow($this->radius, 2); // use constant M_PI = 3.14~
    }

    public function center($x, $y)
    {
        echo "Center circle x:$x, y:$y", "<br>";
    }
}


class Rectangle extends Figure
{
    private $a, $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function area()
    {
        return $this->a * $this->b;
    }

    public function center($x, $y)
    {
        echo "Center rectangle x:$x, y:$y", "<br>";
    }
}

$c = new Circle(7);
echo "Circle area {$c->area()} with radius = {$c->getRadius()}", "<br>";
$c->center(1, 3);

$r = new Rectangle(3, 5);
echo "Rectangle area {$r->area()} with A = {$r->getA()} B = {$r->getB()}", "<br>";
$r->center(-4, 3);
