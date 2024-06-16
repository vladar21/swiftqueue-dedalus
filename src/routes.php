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
    (new AuthController())->login($request, $response);
});
$router->get('/logout', function(Request $request, Response $response) {
    (new AuthController())->logout($request, $response);
});

// Course routes with policies
$router->get('/courses', function (Request $request, Response $response) {
    CoursePolicy::view($request);
    (new CourseController())->index($request, $response);
});
$router->get('/courses/create', function (Request $request, Response $response) {
    CoursePolicy::create($request);
    (new CourseController())->create($request, $response);
});
$router->post('/courses/create', function (Request $request, Response $response) {
    CoursePolicy::create($request);
    (new CourseController())->create($request, $response);
});
$router->get('/courses/edit', function (Request $request, Response $response) {
    CoursePolicy::edit($request);
    (new CourseController())->edit($request, $response);
});
$router->post('/courses/edit', function (Request $request, Response $response) {
    CoursePolicy::edit($request);
    (new CourseController())->edit($request, $response);
});
$router->post('/courses/delete', function (Request $request, Response $response) {
    CoursePolicy::delete($request);
    (new CourseController())->delete($request, $response);
});

return $router;
?>
