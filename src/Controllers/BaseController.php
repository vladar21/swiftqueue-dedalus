<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

class BaseController {

    public function index(Request $request, Response $response) {
        $response->setStatusCode(501);
    }

    public function create(Request $request, Response $response) {
        $response->setStatusCode(501);
    }

    public function edit(Request $request, Response $response) {
        $response->setStatusCode(501);
    }

    public function delete(Request $request, Response $response) {
        $response->setStatusCode(501);
    }
}
?>
