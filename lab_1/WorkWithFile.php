<?php
header("Content-Type: text/html; charset=utf-8");

class WorkWithFile
{
    public $buff;
    public $filename;

    public function __construct($filename)
    {
        $uploaddir = './';

        $this->filename = $uploaddir . $filename;

        if (!file_exists($this->filename)) exit("File does not exist");

        //file openning

        $fd = fopen($filename, "r");

        if (!$fd) exit("File open error");

        $this->buff = fread($fd, filesize($this->filename));
        fclose($fd);
    }

    // The method displays the contents of the //file on the function screen 
    public function getContent()
    {
        return $this->buff;
    }

    // The method displays the file size

    public function getsize()
    {
        return filesize($this->filename);
    }

    // The method outputs the number of lines in the //function file 

    public function getCount()
    {
        if (!empty($this->filename)) {
            $arr = file($this->filename);

            return count($arr);
        } else {
            return 0;
        }
    }

    public function writeResult()
    {
        $data = array();
        $temp = array();

        if (!empty($this->filename)) {
            $data = file($this->filename);
        } else {
            return 0;
        }

        for ($i = 0; $i < count($data); $i++) {
            if ($i % 3 == 0) { // every index which divided on three
                // Потрібно перетворити наші рядки з формату число перенос на число 
                // витратив на це чимало часу щоб зрозуміти чому не пише в один ряд
                $temp[] = (int) $data[$i];
            }
        }

        $str = implode(" ", $temp);
        $filename = 'output.txt';

        file_put_contents($filename, $str . PHP_EOL);  // додав перенос рядка

        echo 'String written to file successfully.';
    }
}

$first = new WorkWithFile("count.txt");
echo "{$first->getContent()}<br>";
echo "{$first->getsize()}<br>";
echo "{$first->getCount()}<br>";

$file = new WorkWithFile("numbers.txt");
$file->writeResult();
