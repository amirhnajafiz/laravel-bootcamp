<?php

namespace app\core;

abstract class Model {
    protected static $instance = null;
    protected string $tableName;
    protected $db;

    public abstract static function Do();

    public function __construct(string $tableName) {
        $this->tableName = $tableName;
        $this->connect();
    }

    private function connect() {
        $dsn = "mysql:host=127.0.0.1;dbname=library";
        $user = "root";
        $pass = "13801019";
        try {
            $this->db = new \PDO($dsn, $user, $pass);
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function select(string $columns, string $condition = "TRUE") {

        $query = "SELECT {$columns} FROM library.{$this->tableName} ";
        echo $query;
        return $this->db->query($query)->fetchAll();

    }

    public function insert(array $params) {
        $data = [];
        array_walk($params, function ($value, $key) use (&$data) {$data[':' . $key] = $value;});
        $this->db->prepare($this->makeInsertQuery(array_keys($params), array_keys($data)))->execute($data);
    }

    private function makeInsertQuery($array1, $array2) {
        return
            "INSERT INTO {$this->tableName} " . 
            $this->arrayToString($array1) . 
            " VALUES " . 
            $this->arrayToString($array2) . 
            ";"
        ;
    }

    private function arrayToString($array) {
        $string = "(";
        foreach ($array as $element) {
            $string .= $element . ",";
        }

        return preg_replace("/,$/", ")", $string);

    }

}