<?php class A
{
    //the function which print text
    function example()
    {
        echo "This is parent function A::example().<br>";
    }
}

class B extends A
{
    function example()
    {
        // the function which print text //and call “example” function from A-class”
        echo  "This  is  overriden  function B::example().<br>";

        A::example();
    }
}

$b = new B;
$b->example();
