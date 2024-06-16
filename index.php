<?php
session_start();

require_once 'vendor/autoload.php';

use App\Core\Request;
use App\Core\Response;
use App\Core\Router;
use App\Core\Config;

// Load configuration
$config = Config::getInstance();

// Create Request and Response objects
$request = new Request();
$response = new Response();

// Create Router instance
$router = new Router();

// Load routes
require_once '../src/routes.php';

// Resolve the request
$router->resolve($request, $response);

// Enable error reporting based on environment
if ($config->isDevelopment()) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}
?>
