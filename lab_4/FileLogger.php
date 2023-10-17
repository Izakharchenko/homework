<?php
interface ILogger
{
    //definition an function which must be //redefined in the next class
    public function log($message);
}

trait PrintTime
{
    public function now()
    {
        return date("F j, Y, g:i a");
    }
}

trait Message
{
    public function prepareMessage($time, $message)
    {
        return  "$time - $message" . PHP_EOL;
    }
}


class FileLogger implements ILogger
{
    use PrintTime, Message;

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
        // use traits method now() from PrintTime and prepareMessage from Message
        fwrite($this->file,  $this->prepareMessage($this->now(), $message));
    }

    public function __destruct()
    {
        if ($this->file) {
            fclose($this->file);
        }
    }
}

$FLog = new FileLogger('./log.txt', 'w');

$FLog->log('Warning something was wrong but not critical');

$FLog->log('Success the email has been sent');
