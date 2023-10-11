<?php
interface Engine
{
    public function engineOn();
}

interface Fuel
{
    public function setTypeFuel($type);
    public function getTypeFuel();
}

class Vehicle implements Engine, Fuel
{
    public $model;
    public $serialNumber;
    public static $count = 0;
    protected $typeFuel;

    public function __construct($model, $serialNumber)
    {
        $this->model = $model;
        $this->serialNumber = $serialNumber;
        self::$count++;
    }

    public function __destruct()
    {
        echo "Destruct ", __CLASS__, "<br>";
    }
    // implement engine function from interface Engine
    public function engineOn()
    {
        echo "Engine in on ", "<br>";
    }
    // implement setTypeFuel function from interface Fuel
    public function setTypeFuel($type)
    {
        $this->typeFuel = $type;
    }
    // implement getTypeFuel function from interface Fuel
    public function getTypeFuel()
    {
        echo "I use $this->typeFuel", "<br>";
    }

    public function show()
    {
        echo "{$this->model} {$this->serialNumber}", "<br>";
    }

    public static function countProducedVehicle()
    {
        echo 'Vehicle ', self::$count, ' produced. <br>';
    }
}

class Car extends Vehicle
{
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

$c->show();
$t->show();
$t->setTypeFuel('Electric');
$t->getTypeFuel();

Vehicle::countProducedVehicle();
