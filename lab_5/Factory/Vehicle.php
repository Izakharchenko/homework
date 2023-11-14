<?php

interface VehicleFactory
{
    public function createVehicle();
}

class Vehicle
{
    public function __construct(
        protected $made,
        protected $brand,
        protected $yearManufacturer
    ) {
    }

    public function getBaseInfo()
    {
        echo "$this->made, $this->brand, $this->yearManufacturer", "<br>";
    }
}

//Автомобіль Car (двигун, потужність, колір) 
class Car extends Vehicle
{
    protected $engine;
    protected $power;
    protected $color;

    public function __construct($made, $brand, $yearManufacturer)
    {
        parent::__construct($made, $brand, $yearManufacturer);
    }
}

class Bike extends Vehicle
{
    protected $weight;
    protected $type;
    protected $wheels;

    public function __construct($made, $brand, $yearManufacturer)
    {
        parent::__construct($made, $brand, $yearManufacturer);
    }
}

class Motorcycle extends Vehicle
{
    protected $engine;
    protected $color;
    protected $type;

    public function __construct($made, $brand, $yearManufacturer)
    {
        parent::__construct($made, $brand, $yearManufacturer);
    }
}
