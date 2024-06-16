<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;

class AuthController extends BaseController {

    /**
     * Show the login form and handle login.
     *
     * @param Request $request
     * @param Response $response
     */
    public function login(Request $request, Response $response) {
        if ($request->isPost()) {
            $username = $request->getBody()['username'];
            $password = $request->getBody()['password'];

            if (Auth::login($username, $password)) {
                $response->redirect('/user_courses');
            } else {
                $response->view('auth/login', ['error' => 'Invalid username or password']);
            }
        } else {
            $response->view('auth/login');
        }
    }

    /**
     * Logout the user.
     *
     * @param Request $request
     * @param Response $response
     */
    public function logout(Request $request, Response $response) {
        Auth::logout();
        $response->redirect('/login');
    }
}
?>
