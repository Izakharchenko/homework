<?php

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '\\Singleton\\Instance.php');

class DBConnection
{
    use Instance;

    private function __construct()
    {
        self::$instance = new mysqli('localhost', 'root', '', 'education');

        if (self::$instance->connect_error) {

            throw new Exception("Connection error : ");
        }

        self::$instance->query("SET NAMES 'UTF8'");
    }

    public function get_data()
    {
        $query = "SELECT * from menu";
        $result = self::$instance->query($query);
        for ($i = 0; $i < $result->num_rows; $i++) {

            $row[] = $result->fetch_assoc();
        }

        return $row;
    }

    private function __clone()
    {
    }

    // I get Warning: The magic method SomeClass::__wakeup() must have public visibility
    public function __wakeup()
    {
    }
}

$db = DBConnection::getInstance();
$db1 = DBConnection::getInstance();


if ($db === $db1) {
    echo "Singleton works, both variables contain the same instance.";
} else {
    echo "Singleton failed, variables contain different instances.";
}
