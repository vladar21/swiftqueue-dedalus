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
}
?>
