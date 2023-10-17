<?php

abstract class Base
{
    public abstract function show();
}

class Flight extends Base
{
    private $start;
    private $end;
    private $duration;
    private $name;

    public function __construct($name, $start, $end, $duration)
    {
        $this->setName($name);
        $this->setStart($start);
        $this->setEnd($end);
        $this->setDuration($duration);
    }

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
        return "Flight '{$this->getName()}' starts {$this->getStart()} End {$this->getEnd()}";
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

class TraineeFlight extends Base
{
    private $start;
    private $end;
    private $duration;
    private $name;

    public function __construct($name, $start, $end, $duration)
    {
        $this->setName($name);
        $this->setStart($start);
        $this->setEnd($end);
        $this->setDuration($duration);
    }

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
    private function generateString()
    {
        return "Trainee Flight '{$this->getName()}' starts {$this->getStart()} End {$this->getEnd()}";
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

$flight1 = new Flight("KL", "12.09.2023 9:00", "12.09.2023 10:20", "1h 20min");
$tFlight = new TraineeFlight("TR", "17.10.2023 14:00", "17.10.2023 16:00", "2h 0min");
$flight1->show();
$tFlight->show();
