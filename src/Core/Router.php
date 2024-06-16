<?php

namespace App\Core;

class Router {
    private $routes = [];
    private $fallback;


    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    public function fallback($callback) {
        $this->fallback = $callback;
    }

    public function resolve(Request $request, Response $response) {
        $method = $request->getMethod();
        $path = $request->getPath();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            if ($this->fallback) {
                call_user_func($this->fallback, $request, $response);
            } else {
                $response->setStatusCode(404);
                $response->view('errors/404');
            }
            return;
        }

        call_user_func($callback, $request, $response);
    }

}
?>
