<?php

namespace App\Core;

use PDO;

/**
 * Class Database
 * Manages the connection to the database.
 */
class Database {
    private $pdo;
    private $error;

    /**
     * Database constructor.
     * Initializes the connection parameters and creates a PDO instance.
     */
    public function __construct() {
        $config = Config::getInstance();
        $dsn = 'sqlite:' . $config->get('DB_DATABASE');

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, null, null, $options);
        } catch (\PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Get the PDO connection.
     *
     * @return PDO
     */
    public function getConnection() {
        return $this->pdo;
    }
}
?>
