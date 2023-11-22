<?php

namespace lab_6;

class Flight
{
    private $tickets = [];

    /**
     * Take ticket to a board
     * method get xml data
     * 
     * @param [type] $request
     * @return void
     */
    public function takeTicket($request): void
    {
        // some validation xml
        array_push($this->tickets, $request);
        echo "Take Ticket xml data format", "<br>";
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
}


class SpecificTicket
{
    /**
     * Specific take ticket
     *
     * @param [type] $request
     * @return void
     */
    public function specificTakeTicket($request)
    {
        // some validation json data
        return "Specific Take Ticket: $request";
    }
}


class Adapter extends Flight
{
    private $adapter;

    public function __construct(SpecificTicket $adapter)
    {
        $this->adapter = $adapter;
    }

    public function takeTicket($request): void
    {
        // validate transform json to xml for example
        echo $this->adapter->specificTakeTicket($request);
    }
}


function clientCode(Flight $flight, $request)
{
    $flight->takeTicket($request);
}

$flight1 = new Flight();
$flight1->setStart("12.09.2023 9:00");
$flight1->setEnd("12.09.2023 10:20");
$flight1->setDuration("1h 20min");
$flight1->setName('KL');

$request = 'some data for booked ticket in xml format';

clientCode($flight1, $request);

$flight2 = new SpecificTicket();

$req = 'Json data for booked ticket';

$adapter = new Adapter($flight2);
$adapter->setStart("12.09.2023 9:00");
$adapter->setEnd("12.09.2023 10:20");
$adapter->setDuration("2h 20min");
$adapter->setName('UL');
clientCode($adapter, $req);
