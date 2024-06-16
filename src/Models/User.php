<?php

namespace App\Models;

use PDO;

class User extends Model {
    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct() {
        parent::__construct();
        echo "User model instantiated.<br>";
    }

    /**
     * Find a user by username.
     *
     * @param string $username
     * @return User|null
     */
    public function findByUsername($username) {
        echo "Finding user by username: $username<br>";
        $stmt = $this->getConnection()->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $user = $stmt->fetch();
        echo "User found: " . ($user ? $user->username : 'none') . "<br>";
        return $user;
    }

    /**
     * Get all users.
     *
     * @return array
     */
    public function all() {
        echo "Getting all users.<br>";
        $stmt = $this->getConnection()->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public function find($id) {
        echo "Finding user by ID: $id<br>";
        $stmt = $this->getConnection()->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $user = $stmt->fetch();
        echo "User found by ID: " . ($user ? $user->username : 'none') . "<br>";
        return $user;
    }

    /**
     * Get the role of the user.
     *
     * @return string
     */
    public function getRole() {
        return $this->role;
    }
}
?>
