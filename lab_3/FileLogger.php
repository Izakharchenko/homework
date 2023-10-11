<?php
interface ILogger
{
    //definition an function which must be //redefined in the next class
    public function log($message);
}

class FileLogger implements ILogger
{
    private $file;
    private $logFile;

    public function __construct($filename, $mode = 'a')
    {
        $this->logFile = $filename;
        //open file or print an error
        $this->file = fopen($filename, $mode) or die('Could not open the log file');
    }

    public function log($message)
    {
        //redefinition “log” function
        $message = date("F j, Y, g:i a") . ': ' . $message . "\n";

        fwrite($this->file, $message);
    }

    public function __destruct()
    {
        if ($this->file) {
            fclose($this->file);
        }
    }
}

$FLog = new FileLogger('./log.txt', 'w');

$FLog->log('log message');

$FLog->log('another log message');
