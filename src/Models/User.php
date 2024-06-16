<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User {
    /**
     * Find a user by username.
     *
     * @param string $username
     * @return object|null
     */
    public static function findByUsername($username) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return object|null
     */
    public static function find($id) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>
