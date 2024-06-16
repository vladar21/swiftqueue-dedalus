<?php

use App\Controllers\AuthController;
use App\Controllers\UserCourseController;
use App\Core\Router;
use App\Core\Request;
use App\Core\Response;
use App\Policies\AuthPolicy;
use App\Policies\CoursePolicy;

$router = new Router();

// Root route
$router->get('/', function(Request $request, Response $response) {
    AuthPolicy::redirectToLogin($request, $response);
});

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

// User courses routes
$router->get('/user_courses', function (Request $request, Response $response) {
    AuthPolicy::view($request);
    (new UserCourseController())->index($request, $response);
});
$router->get('/user_courses/create', function (Request $request, Response $response) {
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new UserCourseController())->create($request, $response);
});
$router->post('/user_courses/create', function (Request $request, Response $response) {
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new UserCourseController())->create($request, $response);
});
$router->get('/user_courses/edit', function (Request $request, Response $response) {
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new UserCourseController())->edit($request, $response);
});
$router->post('/user_courses/edit', function (Request $request, Response $response) {
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new UserCourseController())->edit($request, $response);
});
$router->post('/user_courses/delete', function (Request $request, Response $response) {
    AuthPolicy::view($request);
    CoursePolicy::delete($request);
    (new UserCourseController())->delete($request, $response);
});

// Fallback route
$router->fallback(function (Request $request, Response $response) {
    $response->setStatusCode(404);
    $response->view('errors/404');
});


return $router;

