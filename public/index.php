<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Request;
use App\Core\Response;
use App\Core\Config;

echo "Index file loaded.<br>";

// Load configuration
$config = Config::getInstance();
echo "Configuration loaded.<br>";

// Create Request and Response objects
$request = new Request();
$response = new Response();
echo "Request and Response objects created.<br>";

// Load and resolve routes
$router = require_once __DIR__ . '/../src/routes.php';
$router->resolve($request, $response);
echo "Routes resolved.<br>";

// Enable error reporting based on environment
if ($config->isDevelopment()) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    echo "Development environment detected.<br>";
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
    echo "Production environment detected.<br>";
}
?>
