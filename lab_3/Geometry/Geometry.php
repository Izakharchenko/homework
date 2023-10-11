<?php

interface Figure
{
    public function draw();
    public function move();

    public function erase();
    public function getColor();
    public function setColor($color);
}

class Circle implements Figure
{
    private $color = 'green';

    public function draw()
    {
        echo "🟢", "<br>";
    }

    public function move()
    {
        echo "Circle is moved!", "<br>";
    }

    public function erase()
    {
        echo __CLASS__ . " cleaned.", "<br>";
    }

    public function getColor()
    {
        echo __CLASS__ . " color is $this->color", "<br>";
    }

    public function setColor($color)
    {
        $this->color = $color;
        echo __CLASS__ . " is $color", "<br>";
    }
}

class Square implements Figure
{
    private $color = 'green';

    public function draw()
    {
        echo "🟩", "<br>";
    }

    public function move()
    {
        echo __CLASS__ . " is moved!", "<br>";
    }

    public function erase()
    {
        echo __CLASS__ . " cleaned.", "<br>";
    }

    public function getColor()
    {
        echo __CLASS__ . " color is $this->color", "<br>";
    }

    public function setColor($color)
    {
        $this->color = $color;
        echo __CLASS__ . " is $color", "<br>";
    }
}

class Triangle implements Figure
{
    private $color = 'green';

    public function draw()
    {
        echo "📐", "<br>";
    }

    public function move()
    {
        echo __CLASS__ . " is moved!", "<br>";
    }
    public function erase()
    {
        echo __CLASS__ . " cleaned.", "<br>";
    }

    public function getColor()
    {
        echo __CLASS__ . " color is $this->color", "<br>";
    }

    public function setColor($color)
    {
        $this->color = $color;
        echo __CLASS__ . " is $color", "<br>";
    }
}

$c = new Circle();
$c->draw();
$c->erase();

$s = new Square();
$s->draw();
$s->erase();

$t = new Triangle();
$t->draw();
$t->erase();
