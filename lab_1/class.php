<?php class Coor
{
    private $text;
    private $login, $password;


    function __construct($text, $login, $password) // function for setting name  
    {
        $this->text = $text; //set some “text” to this “text”;
        $this->login = $login; //set some login;
        $this->password = $password; //set some password;
    }

    function getName()  //function for getting name
    {
        echo "<p>Name: " . $this->text . "</p>"; // printing name  
    }

    function getData()
    {
        echo  "login: $this->login | password: $this->password", "<br>";
    }

    function __destruct()
    {
        print "Destroying " . $this->text . "\n";
    }
}

// $object = new Coor("Nick"); //creating “Coor” object

// $object->getName(); //function call

// unset($object);

// if (!isset($object)) {
//     echo "Object is deleted!", "<br>";
// }

$user1 = new Coor("Nick", 'nick1', '12345');
$user2 = new Coor("Pitter", 'pit124', 'strongPassword');
$user3 = new Coor("Parker", 'spider-man', 'weakPassword');

$user1->getData();
$user2->getData();
$user3->getData();
