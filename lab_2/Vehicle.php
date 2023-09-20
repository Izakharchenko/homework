<?php

class Vehicle
{
    public $model;
    public $serialNumber;
    public static $count = 0;

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

Vehicle::countProducedVehicle();
