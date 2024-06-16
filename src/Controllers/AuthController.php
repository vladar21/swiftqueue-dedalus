<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\Auth;

class AuthController {

    public function login(Request $request, Response $response) {
        if ($request->isPost()) {
            $response->redirect('/courses');
        } else {
            $error = $request->getParam('error');
            $response->view('auth/login', ['error' => $error]);
        }
    }

    public function logout(Request $request, Response $response) {
        Auth::logout();
        $response->redirect('/login');
    }
}
?>
