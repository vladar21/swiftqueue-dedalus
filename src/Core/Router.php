<?php

namespace App\Core;

class Router {
    private $routes = [];

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve(Request $request, Response $response) {
        $method = $request->getMethod();
        $path = $request->getPath();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $response->setStatusCode(404);
            $response->view('errors/404');
            return;
        }

        call_user_func($callback, $request, $response);
    }
}
?>
