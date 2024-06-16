<?php

namespace App\Core;

use App\Models\User;

class Auth {

    /**
     * Attempt to login a user.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function login($username, $password) {
        echo "Attempting to login user: $username<br>";
        $user = (new User())->findByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            echo "Login successful for user: $username<br>";
            return true;
        }
        echo "Login failed for user: $username<br>";
        return false;
    }

    /**
     * Logout the user.
     */
    public static function logout() {
        unset($_SESSION['user_id']);
        session_destroy();
        echo "User logged out.<br>";
    }

    /**
     * Get the currently authenticated user.
     *
     * @return User|null
     */
    public static function user() {
        if (isset($_SESSION['user_id'])) {
            return (new User())->find($_SESSION['user_id']);
        }
        return null;
    }

    /**
     * Check if the user is authenticated.
     *
     * @return bool
     */
    public static function check() {
        return isset($_SESSION['user_id']);
    }

    /**
     * Get the role of the authenticated user.
     *
     * @return string|null
     */
    public static function role() {
        $user = self::user();
        return $user ? $user->role : null;
    }
}
?>

?>
