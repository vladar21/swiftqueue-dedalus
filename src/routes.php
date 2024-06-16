<?php

use App\Controllers\UserCourseController;
use App\Controllers\AuthController;
use App\Core\Router;
use App\Core\Request;
use App\Core\Response;
use App\Policies\AuthPolicy;
use App\Policies\CoursePolicy;

$router = new Router();

echo "Router created.<br>";

// Root route
$router->get('/', function(Request $request, Response $response) use ($router) {
    echo "Root route.<br>";
    AuthPolicy::redirectToLogin($request, $response);
});

// Authentication routes
$router->get('/login', function(Request $request, Response $response) use ($router) {
    echo "Login route.<br>";
    (new AuthController($router->getDbConnection()))->login($request, $response);
});
$router->post('/login', function(Request $request, Response $response) use ($router) {
    echo "Login POST route.<br>";
    AuthPolicy::login($request);
    (new AuthController($router->getDbConnection()))->login($request, $response);
});
$router->get('/logout', function(Request $request, Response $response) use ($router) {
    echo "Logout route.<br>";
    AuthPolicy::view($request); // Ensure user is authenticated before logout
    (new AuthController($router->getDbConnection()))->logout($request, $response);
});

// User courses routes with policies
$router->get('/user_courses', function (Request $request, Response $response) use ($router) {
    AuthPolicy::view($request);
    (new UserCourseController($router->getDbConnection()))->index($request, $response);
});
$router->get('/user_courses/create', function (Request $request, Response $response) use ($router) {
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new UserCourseController($router->getDbConnection()))->create($request, $response);
});
$router->post('/user_courses/create', function (Request $request, Response $response) use ($router) {
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new UserCourseController($router->getDbConnection()))->create($request, $response);
});
$router->get('/user_courses/edit', function (Request $request, Response $response) use ($router) {
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new UserCourseController($router->getDbConnection()))->edit($request, $response);
});
$router->post('/user_courses/edit', function (Request $request, Response $response) use ($router) {
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new UserCourseController($router->getDbConnection()))->edit($request, $response);
});
$router->post('/user_courses/delete', function (Request $request, Response $response) use ($router) {
    AuthPolicy::view($request);
    CoursePolicy::delete($request);
    (new UserCourseController($router->getDbConnection()))->delete($request, $response);
});

// Fallback route
$router->fallback(function (Request $request, Response $response) {
    $response->setStatusCode(404);
    $response->view('errors/404');
});

echo "Routes loaded.<br>";

return $router;
?>
