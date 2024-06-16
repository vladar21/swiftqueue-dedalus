<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private $connection;

    public function __construct() {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $dsn = $_ENV['DB_CONNECTION'] . ':' . $_ENV['DB_DATABASE'];
        echo "DSN: $dsn<br>";

        try {
            $this->connection = new PDO($dsn);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connection established.<br>";
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage() . '<br>';
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
