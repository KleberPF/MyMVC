<?php

namespace app\core;

use PDO;
use PDOException;

class Database
{
    // database information
    private string $host = 'localhost';
    private string $user = 'root';
    private string $pass = '';
    private string $name = '';

    // PDO instance
    private PDO $pdo;

    // current statement
    private $statement;

    public function __construct()
    {
        $dsn = "mysql:host" . $this->host . ";dbname=" . $this->name;
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
}