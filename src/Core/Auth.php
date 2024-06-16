<?php

namespace App\Core;

use App\Models\User;

class Auth {
    /**
     * Attempt to log in a user.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function login($username, $password) {
        $user = User::findByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_role'] = $user->role;
            return true;
        }
        return false;
    }

    /**
     * Log out the current user.
     */
    public static function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']);
    }

    /**
     * Get the currently authenticated user.
     *
     * @return User|null
     */
    public static function user() {
        if (isset($_SESSION['user_id'])) {
            return User::find($_SESSION['user_id']);
        }
        return null;
    }

    /**
     * Check if a user is authenticated.
     *
     * @return bool
     */
    public static function check() {
        return isset($_SESSION['user_id']);
    }

    /**
     * Get the role of the currently authenticated user.
     *
     * @return string|null
     */
    public static function role() {
        return $_SESSION['user_role'] ?? null;
    }
}
?>
