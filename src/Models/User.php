<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User {
    public $id;
    public $username;
    public $password;
    public $role;

    /**
     * Find a user by username.
     *
     * @param string $username
     * @return User|null
     */
    public static function findByUsername($username) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $user = $stmt->fetch();
        echo "User found: " . ($user ? $user->username : 'none') . "<br>";
        return $user;
    }

    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public static function find($id) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $user = $stmt->fetch();
        echo "User found by ID: " . ($user ? $user->username : 'none') . "<br>";
        return $user;
    }
}
?>
