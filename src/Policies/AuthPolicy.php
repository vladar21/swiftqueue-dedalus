<?php

namespace App\Policies;

use App\Core\Auth;
use App\Core\Request;

class AuthPolicy {
    public static function view(Request $request) {
        if (!Auth::check()) {
            $request->redirect('/login');
        }
    }

    public static function login(Request $request) {
        $body = $request->getBody();
        $username = $body['username'] ?? null;
        $password = $body['password'] ?? null;
        if (!Auth::login($username, $password)) {
            $request->redirect('/login?error=Invalid credentials');
        }
    }
}
?>
