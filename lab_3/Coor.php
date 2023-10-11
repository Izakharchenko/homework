<?php

abstract class Coor
{
    private $firstName = "";
    private $secondName = "";

    // method which set full name
    public function setName($firstName, $secondName): void
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
    }

    public function getName(): string
    {
        return "$this->firstName $this->secondName";
    }

    abstract public function showWelcomeMessage();
}

class Visitor extends Coor
{
    public function showWelcomeMessage()
    {
        echo "Hi {$this->getName()}, welcome to our shop!To buy something, please, register!<br>";
    }

    public function newMessage($subject)
    {
        echo "Creating new message $subject<br>";
    }
}

class Member extends Coor
{
    public function showWelcomeMessage()
    {
        echo "Hi {$this->getName()}, welcome to our shop!What will you buy today?<br>";
    }
}

class Shopper extends Coor
{
    public function showWelcomeMessage()
    {
        echo "Hi {$this->getName()}, welcome to our online store!<br>";
    }

    public function addToCart($item)
    {
        echo "Adding $item to cart<br>";
    }
}

$visitor = new Visitor();
$member = new Member();
$shopper = new Shopper();

$visitor->setName("Agatha", "Christie");
$member->setName("Stephen", "King");
$shopper->setName("Robert", "Martin");

$visitor->showWelcomeMessage();
$member->showWelcomeMessage();
$shopper->showWelcomeMessage();

$visitor->newMessage("Delivery");
$shopper->addToCart("Teddy bear");
