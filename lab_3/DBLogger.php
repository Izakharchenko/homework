<?php
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '\\lab_3\\ILogger.php');

class DBLogger extends ILogger
{
    private $connection;

    public function __construct($config)
    {
        $this->connection = new mysqli(
            $config["HOST"],
            $config["USER"],
            $config["PASSWORD"],
            $config["DB_NAME"],
            $config["PORT"]
        );
    }
    public function log($message)
    {
        //insert message to db
        $this->connection->query("INSERT INTO logs (message) VALUES ('{$message}')");
    }

    public function getLogs()
    {
        $result = $this->connection->query("select * from logs");
        foreach ($result as $row) {
            echo "id = {$row['id']} {$row['message']} {$row['time']}",  "<br>";
        }
    }
}

$config = parse_ini_file('.env'); // load config to db

$dbLog = new DBLogger($config);

$dbLog->log('log message');

$dbLog->log('another log message');

$dbLog->getLogs();
