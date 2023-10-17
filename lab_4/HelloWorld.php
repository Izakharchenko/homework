<?php

trait my_first_trait //train creating
{
    public function traitFunction()
    {
        echo "Hello world", "<br>";
    }

    public function greeting()
    {
        $message = "Good ";
        $now = (int) date('H'); // current hour converted to int

        if ($now >= 6 && $now < 12) {
            $message .= "morning.";
        } else if ($now > 13 && $now < 18) {
            $message .= "day.";
        } else if ($now > 19 && $now <= 24) {
            $message .= "eventing.";
        } else {
            $message .= "night.";
        }

        return $message;
    }
}

class helloWorld
{
    use my_first_trait;  //train using
}

$objTest = new HelloWorld();

$objTest->traitFunction();
echo $objTest->greeting();
