<?php

namespace App\Core;

class View {
    public static function render($view, $params = []) {
        extract($params);
        ob_start();
        require_once __DIR__ . "/../../views/{$view}.php";
        $content = ob_get_clean();
        require_once __DIR__ . "/../../views/layouts/main.php";
    }
}
?>
