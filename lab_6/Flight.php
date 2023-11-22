<?php

namespace lab_6;

class Flight
{
    public function __construct(
        private $name,
        private $start,
        private $end,
        private $duration
    ) {
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

    public function __clone()
    {
    }
}

$flight1 = new Flight("KL", "12.09.2023 9:00", "12.09.2023 10:20", "1h 20min");
$flight1->show();


$flight2 = clone $flight1;
echo "This is copy of flight1 object ";
$flight2->show();
