<?php

namespace App\Core;

use PDO;

class ConnectionManager {
    private $connection;

    public function __construct() {
        // Ensure .env file is loaded
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        // Debug: Check if the .env variables are loaded
        $db_connection = $_ENV['DB_CONNECTION'] ?? 'not set';
        $db_database = $_ENV['DB_DATABASE'] ?? 'not set';
        echo "DB_CONNECTION: $db_connection<br>";
        echo "DB_DATABASE: $db_database<br>";

        $dsn = $_ENV['DB_CONNECTION'] . ':' . $_ENV['DB_DATABASE'];
        echo "DSN: $dsn<br>";

        try {
            $this->connection = new PDO($dsn);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connection established.<br>";
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage() . '<br>';
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
