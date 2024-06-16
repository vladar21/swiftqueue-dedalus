<?php

namespace App\Core;

class Response {
    private $statusCode = 200;

    /**
     * Set the HTTP response status code.
     *
     * @param int $code
     */
    public function setStatusCode(int $code) {
        $this->statusCode = $code;
        http_response_code($code);
    }

    /**
     * Redirect to a given URL.
     *
     * @param string $url
     */
    public function redirect(string $url) {
        header("Location: $url");
        exit;
    }

    /**
     * Render a view.
     *
     * @param string $view
     * @param array $params
     */
    public function view(string $view, array $params = []) {
        extract($params);
        ob_start();
        require_once __DIR__ . "/../../views/{$view}.php";
        $content = ob_get_clean();
        require_once __DIR__ . "/../../views/layouts/main.php";
    }
}
?>
