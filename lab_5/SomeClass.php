<?php
class SomeClass
{
    private static $_instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __clone()
    {
    }

    // I get Warning: The magic method SomeClass::__wakeup() must have public visibility
    public function __wakeup()
    {
    }
}

$someClass1 = SomeClass::getInstance();
$someClass2 = SomeClass::getInstance();

if ($someClass1 === $someClass2) {
    echo "Singleton works, both variables contain the same instance.";
} else {
    echo "Singleton failed, variables contain different instances.";
}
