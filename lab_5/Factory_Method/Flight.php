<?php


abstract class Creator
{

    abstract public function factoryMethod(): Flight;

    public function takeFlight(): string
    {
        $product = $this->factoryMethod();
        $result = "Creator: The same creator's code has just worked with ";
        $product->start();

        return $result;
    }
}

interface Flight
{
    public function start(): void;

    public function getName(): string;

    public function getDuration(): string;

    public function takeTicket($name, $email): void;
}

class SpaceFlight extends Creator
{

    public function __construct(
        private $name,
        private $start,
        private $end,
        private $duration
    ) {
    }

    public function factoryMethod(): Flight
    {
        return new SpaceConnector($this->name, $this->start, $this->end, $this->duration);
    }
}

class CivilFlight extends Creator
{

    public function __construct(
        private $name,
        private $start,
        private $end,
        private $duration
    ) {
    }


    public function factoryMethod(): Flight
    {
        return new CivilConnector($this->name, $this->start, $this->end, $this->duration);
    }
}

class SpaceConnector implements Flight
{

    public function __construct(
        private $name,
        private $start,
        private $end,
        private $duration
    ) {
    }

    public function start(): void
    {
        echo "Starting Space Flight...", "<br>";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function takeTicket($name, $email): void
    {
        echo "You $name have a ticket.", "<br>";
    }
}

class CivilConnector implements Flight
{

    public function __construct(
        private $name,
        private $start,
        private $end,
        private $duration
    ) {
    }

    public function start(): void
    {
        echo "Starting Civil Flight...", "<br>";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function takeTicket($name, $email): void
    {
        echo "You $name have a ticket.", "<br>";
    }
}


function clientCode(Creator $creator)
{
    $creator->takeFlight();
}


echo "Testing ConcreteCreator1:\n";
clientCode(new CivilFlight('KL', '12.09.2023 9:00', '12.09.2023 10:20', '1h 20min'));
echo "\n\n";

echo "Testing ConcreteCreator2:\n";
clientCode(new SpaceFlight('NASA', '12.09.2023 9:00', '13.09.2023 9:00', '24h 0min'));
