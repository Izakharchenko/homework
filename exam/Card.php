<?php

class Card
{
    private $nameBook;
    private $author;
    private $countBooksOnHand;
    private $givenDate;
    private $returnedDate;


    public function __construct($nameBook, $author, $countBooksOnHand, $givenDate, $returnedDate)
    {
        $this->nameBook = $nameBook;
        $this->author = $author;
        $this->countBooksOnHand = $countBooksOnHand;
        $this->givenDate = $givenDate;
        $this->returnedDate = $returnedDate;
    }

    public function info()
    {
        echo "Name book: $this->nameBook <br> Author: $this->author <br>
        Available Books: $this->countBooksOnHand <br>
        Given date: $this->givenDate <br>
        Returned date: $this->returnedDate <br> 
        ";
    }

    public function calculateDaysOnHand()
    {
        $issuedtime = strtotime($this->givenDate);
        $retTime = strtotime($this->returnedDate);
        $secondsON = $retTime - $issuedtime;
        $daysON = $secondsON / (60 * 60 * 24);

        echo "Days on hand: $daysON <br>";
    }

    public function __destruct()
    {
        echo "Визвали деструктор класу Card";
    }
}


$book = new Card("Крістіна", "Стівен Кінг", 10, "2024-01-01", "2024-01-15");

$book->info();
$book->calculateDaysOnHand();
