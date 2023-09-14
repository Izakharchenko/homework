<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '\\lab_1\\CSV.php');

class Flight
{
    public $start;
    public $end;
    public $duration;

    private $name;

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

$flight1 = new Flight(); // Створення екземпляра класу Flight
$flight1->setStart("12.09.2023 9:00"); // Встановлення всластивості
$flight1->setEnd("12.09.2023 10:20");
$flight1->setDuration("1h 20min");
$flight1->setName('KL');
// $flight1->show(); // Виклик публічного методу
// $flight1->search("9:00");
//$flight1->setName("");


$flight2 = new Flight();
$flight2->setStart("12.09.2023 9:00");
$flight2->setEnd("12.09.2023 10:20");
$flight2->setDuration("2h 20min");
$flight2->setName('UL');
// $flight2->show();
// $flight2->search("6:00");

$flight2 = new Flight();
$flight2->setStart("14.09.2023 16:00");
$flight2->setEnd("14.09.2023 20:20");
$flight2->setDuration("4h 20min");
$flight2->setName('AL');
// $flight2->show();
// $flight2->search("14.09.2023");

$flight3 = new Flight();
$flight3->setStart("15.09.2023 16:00");
$flight3->setEnd("15.09.2023 17:20");
$flight3->setDuration("3h 20min");
$flight3->setName('AM');

$flight4 = new Flight();
$flight4->setStart("15.09.2023 16:20");
$flight4->setEnd("15.09.2023 17:00");
$flight4->setDuration("40min");
$flight4->setName('YM');

$flight5 = new Flight();
$flight5->setStart("20.09.2023 16:20");
$flight5->setEnd("20.09.2023 17:00");
$flight5->setDuration("40min");
$flight5->setName('YG');

$flight = array();

$flight[] = $flight1;
$flight[] = $flight2;
$flight[] = $flight3;
$flight[] = $flight4;
$flight[] = $flight5;


function show_objects(array $array_flights)
{
    for ($i = 0; $i < count($array_flights); $i++) {
        echo $i + 1, ": ";
        $array_flights[$i]->show();
    }
}
echo "# # #", "<br>";
show_objects($flight);

try {
    $csv = new CSV("flight.csv");

    $res = array();
    // Підготовка масиву для збереження
    foreach ($flight as $fl) {
        $res[] = "{$fl->getName()};{$fl->getStart()};{$fl->getEnd()};{$fl->getDuration()}";
    }
    $csv->setCSV($res);

    echo "## BOARD FLIGHTS ##", "<br>";
    foreach ($csv->getCSV() as $value) {
        echo "Name: {$value[0]} <br>";
        echo "Start Flight:  {$value[1]} <br>";
        echo "End Flight: {$value[2]} <br>";
        echo "Duration: {$value[3]} <br>";
    }
    echo "## END ##";
} catch (Exception $e) {
    echo $e->getMessage();
}
