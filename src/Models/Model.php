<?php

namespace App\Models;

use App\Core\Database;

class Model {
    protected $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getConnection() {
        return $this->db;
    }
}
?>
