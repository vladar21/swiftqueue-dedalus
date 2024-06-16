<?php

use App\Controllers\AuthController;
use App\Core\Router;
use App\Core\Request;
use App\Core\Response;
use App\Policies\AuthPolicy;

$router = new Router();

// Authentication routes
$router->get('/login', function(Request $request, Response $response) {
    (new AuthController())->login($request, $response);
});
$router->post('/login', function(Request $request, Response $response) {
    AuthPolicy::login($request);
    (new AuthController())->login($request, $response);
});
$router->get('/logout', function(Request $request, Response $response) {
    AuthPolicy::view($request); // Ensure user is authenticated before logout
    (new AuthController())->logout($request, $response);
});


return $router;
?>
