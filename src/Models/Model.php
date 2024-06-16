<?php

namespace App\Models;

use App\Core\ConnectionManager;

class Model {
    protected $db;

    public function __construct() {
        echo "Initializing database connection in Model constructor.<br>";
        $this->db = (new ConnectionManager())->getConnection();
    }

    public function getConnection() {
        return $this->db;
    }
}
?>
