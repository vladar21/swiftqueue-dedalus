<?php

namespace App\Policies;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;

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
        if (!$username || !$password || !Auth::login($username, $password)) {
            $request->redirect('/login?error=Invalid credentials');
        }
    }

    public static function redirectToLogin(Request $request, Response $response) {
        if (!Auth::check()) {
            $response->redirect('/login');
        } else {
            $response->redirect('/courses');
        }
    }
}
?>
