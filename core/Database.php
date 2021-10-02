<?php

namespace app\core;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    // database information
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PASS;
    private string $name = DB_NAME;

    // PDO instance
    private PDO $pdo;

    // current statement
    private PDOStatement|bool $statement; // PHP 8 thing

    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->name;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // prepare sql query
    public function query(string $sql): void
    {
        $this->statement = $this->pdo->prepare($sql);
    }

    // bind value
    public function bind($parameter, $value, $type = null): void
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
                break;
        }

        $this->statement->bindValue($parameter, $value, $type);
    }

    // execute the prepared statement
    public function execute()
    {
        return $this->statement->execute();
    }

    // get a single row as an object
    public function row()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // get the row count
    public function rowCount()
    {
        $this->execute();
        return $this->statement->rowCount();
    }
}
