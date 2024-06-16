<?php
namespace App\Core;

use Dotenv\Dotenv;

/**
 * Class Config
 * Handles application configuration.
 */
class Config {
    private static $instance = null;
    private $env;

    private function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        $this->env = $_ENV;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function get($key, $default = null) {
        return $this->env[$key] ?? $default;
    }

    public function isDevelopment() {
        return $this->get('APP_ENV') === 'development';
    }

    public function isProduction() {
        return $this->get('APP_ENV') === 'production';
    }
}
?>
