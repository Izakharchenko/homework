<?php
include_once("model/Book.php");

class Model
{
    private $connection;
    private $config;

    public function __construct()
    {
        $this->config = parse_ini_file('.env'); // load config to db
        $this->connection = new mysqli(
            $this->config["HOST"],
            $this->config["USER"],
            $this->config["PASSWORD"],
            $this->config["DB_NAME"],
            $this->config["PORT"]
        );
    }

    public function getBookList()
    {
        $result = $this->connection->query(
            "select b.title, CONCAT(a.name, ' ', a.surname) as author, b.description from books b
        inner join author a on b.author_id = a.id;"
        );

        return $this->prepareData($result);
    }

    private function prepareData($query)
    {
        $data = [];
        foreach ($query as $row) {
            $data[$row['title']] = new Book($row['title'], $row['author'], $row['description']);
        }

        return $data;
    }
    public function getBook($title)
    {
        // we use the previous function to get all the books and then we return the requested one.   
        // in a real life scenario this will be done through a db select command   
        $allBooks = $this->getBookList();
        return $allBooks[$title];
    }

    public function search($string)
    {
        $result = $this->connection->query(
            "select b.title, CONCAT(a.name, ' ', a.surname) as author, b.description
            from books b
            inner join author a on b.author_id = a.id
            HAVING author LIKE '%$string%' or b.title like '%$string%';"
        );

        if (!$result) {
            return 'No data';
        }

        return $this->prepareData($result);
    }
}
