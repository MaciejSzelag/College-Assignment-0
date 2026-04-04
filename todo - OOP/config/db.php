<?php
class Conn {
    private $pdo;
     
    public function __construct()
    {
        $config = require 'config.php'; // data from file config (array)
        $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['password'], $options);
            //  echo "Successfully connected to the database!";
        } catch (\PDOException $e) {
                // if error - mesg will be displayed
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPdo(){
        return $this->pdo;
    }
}
?>