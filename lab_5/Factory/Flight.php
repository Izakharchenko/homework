<?php

// Define the Factory Interface
interface FlightFactory
{
    public function createFlight($name, $start, $end, $duration): Flight;
}

// Implement the Factory Class
class SpaceFlightFactory implements FlightFactory
{
    public function createFlight($name, $start, $end, $duration): Flight
    {
        return new SpaceFlight($name, $start, $end, $duration);
    }
}

class CivilAviationFactory implements FlightFactory
{
    public function createFlight($name, $start, $end, $duration): Flight
    {
        return new CivilFlight($name, $start, $end, $duration);
    }
}

trait RaceMethods
{
    public function setName(string $name)
    {
        if (strlen($name) == 0) {
            echo "The name field must not be empty", "<br>";
            return;
        }

        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setStart(string $start)
    {
        $this->start = $start;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setEnd(string $end)
    {
        $this->end = $end;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setDuration(string $duration)
    {
        $this->duration = $duration;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function show()
    {
        echo "{$this->generateString()} | Duration {$this->getDuration()}", "<br>";
    }

    // Приватний метод збирає рядок для методу show
    private function generateString()
    {
        return "Flight starts {$this->getStart()} End {$this->getEnd()}";
    }

    public function search(string $searchStr)
    {
        if (str_contains($this->getStart(), $searchStr)) {  // Пошук в рядку
            echo "Searched string $searchStr in {$this->getStart()}", "<br>";
        } else {
            echo "$searchStr not found!", "<br>";
        }
    }
}

// Create the Product Classes
interface Flight
{
    public function start(): void;
}

class SpaceFlight implements Flight
{
    use RaceMethods;

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
}

class CivilFlight implements Flight
{
    use RaceMethods;

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
}

// Use the Factory to Create Objects
$civilFactory = new CivilAviationFactory();
$sFactory = new SpaceFlightFactory();

$fl = $civilFactory->createFlight('KL', '12.09.2023 9:00', '12.09.2023 10:20', '1h 20min');
$fl->start(); // Output: Starting Civilian Flight..

$f2 = $sFactory->createFlight('NASA', '12.09.2023 9:00', '13.09.2023 9:00', '24h 0min');
$f2->start(); // Starting Space Flight...
