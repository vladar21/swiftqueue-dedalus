<?php

namespace App\Core;

class Request {
    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function isPost() {
        return $this->getMethod() === 'POST';
    }

    public function getBody() {
        $body = [];
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    public function getParam($key) {
        return $_GET[$key] ?? null;
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }
}
?>
