<?php
trait Fuel
{
    public function getTypeFuel()
    {
        return $this->typeFuel;
    }

    public function setTypeFuel($fuel)
    {
        $this->typeFuel = $fuel;
    }
}

trait AllWheelDrive
{
    protected $allWheelDrive;

    public function setAllWheelDrive(bool $value)
    {
        $this->allWheelDrive = $value;
    }

    public function getAllWheelDrive()
    {
        return $this->allWheelDrive ? 'Four-wheel drive' : 'Two-wheel drive';
    }
}

class Vehicle
{
    public $model;
    public $serialNumber;
    protected $typeFuel;

    public function __construct($model, $serialNumber)
    {
        $this->model = $model;
        $this->serialNumber = $serialNumber;
    }

    public function __destruct()
    {
        echo "Destruct ", __CLASS__, "<br>";
    }

    public function show()
    {
        echo "{$this->model} {$this->serialNumber}", "<br>";
    }
}

class Car extends Vehicle
{
    use Fuel, AllWheelDrive;

    public function __construct($model, $serialNumber)
    {
        parent::__construct($model, $serialNumber);
    }

    public function __destruct()
    {
        echo "Destruct ", __CLASS__, "<br>";
    }
}

class Truck extends Vehicle
{
    use Fuel, AllWheelDrive;

    public function __construct($model, $serialNumber)
    {
        parent::__construct($model, $serialNumber);
    }

    public function __destruct()
    {
        echo "Destruct ", __CLASS__, "<br>";
    }
}

$c = new Car('Tesla', 'T001A0');
$t = new Truck('Ford', 'FA21A0');

$c->setTypeFuel('Electric');
$t->setTypeFuel('Diesel');

$c->setAllWheelDrive(false);
$t->setAllWheelDrive(true);


$c->show();
echo "{$c->getTypeFuel()}", "<br>";
echo "{$c->getAllWheelDrive()}", "<br>";
$t->show();
echo "{$t->getTypeFuel()}", "<br>";
echo "{$t->getAllWheelDrive()}", "<br>";
