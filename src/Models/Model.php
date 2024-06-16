<?php

namespace App\Models;

use App\Core\Database;

class Model {
    protected static $db;

    public function __construct() {
        self::setConnection();
    }

    public static function setConnection() {
        if (!self::$db) {
            self::$db = (new Database())->getConnection();
        }
    }

    public static function getConnection() {
        if (!self::$db) {
            self::setConnection();
        }
        return self::$db;
    }
}
?>
