<?php

namespace AbstractFactory;

use CivilFlight;

enum TypeFlight: string
{
    case SPACE = 'space';
    case CIVIL = 'civil';
}

trait GeneralMethods
{
    public function setName(string $name)
    {
        if (strlen($name) == 0) {
            echo "The name field must not be empty", "<br>";
            return;
        }

        $this->name = $name;
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


interface Flight
{
    public function show();
}


abstract class AbstractFactory
{
    public static function getFactory(TypeFlight $type)
    {
        switch ($type) {
            case TypeFlight::SPACE:
                return new SpaceFactory();
            case TypeFlight::CIVIL:
                return new CivilAviationFactory();
            default:
                throw new \Exception('Bad config');
                break;
        }
    }
    abstract public function getFlight();
}


class SpaceFactory extends AbstractFactory
{
    public function getFlight()
    {
        return new SpaceFlight();
    }
}

class CivilAviationFactory extends AbstractFactory
{
    public function getFlight()
    {
        return new CivilAviationFlight();
    }
}

class SpaceFlight implements Flight
{
    use GeneralMethods;

    public function show()
    {
        echo "Go to space {$this->generateString()} | Duration {$this->getDuration()}", "<br>";
    }

    public function getName()
    {
        return 'The product from the first factory';
    }
}

class CivilAviationFlight implements Flight
{
    use GeneralMethods;

    public function show()
    {
        echo "Go to next Country {$this->generateString()} | Duration {$this->getDuration()}", "<br>";
    }
}


$flight1 = AbstractFactory::getFactory(TypeFlight::SPACE)->getFlight();
$flight1->setStart("12.09.2023 9:00");
$flight1->setEnd("12.09.2023 10:20");
$flight1->setDuration("1h 20min");
$flight1->setName('SpaceX');
$flight1->show();

$flight2 = AbstractFactory::getFactory(TypeFlight::CIVIL)->getFlight();
$flight2->setStart("12.09.2023 9:00");
$flight2->setEnd("12.09.2023 10:20");
$flight2->setDuration("2h 20min");
$flight2->setName('UL');
$flight2->show();
