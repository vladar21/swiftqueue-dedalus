<?php

use App\Controllers\CourseController;
use App\Controllers\AuthController;
use App\Controllers\UserCourseController;
use App\Core\Router;
use App\Core\Request;
use App\Core\Response;
use App\Policies\AuthPolicy;
use App\Policies\CoursePolicy;

$router = new Router();

echo "Router created.<br>";

// Root route
$router->get('/', function(Request $request, Response $response) {
    echo "Root route.<br>";
    AuthPolicy::redirectToLogin($request, $response);
});

// Authentication routes
$router->get('/login', function(Request $request, Response $response) {
    echo "Login route.<br>";
    (new AuthController())->login($request, $response);
});
$router->post('/login', function(Request $request, Response $response) {
    echo "Login POST route.<br>";
    AuthPolicy::login($request);
    (new AuthController())->login($request, $response);
});
$router->get('/logout', function(Request $request, Response $response) {
    echo "Logout route.<br>";
    AuthPolicy::view($request); // Ensure user is authenticated before logout
    (new AuthController())->logout($request, $response);
});

// Course routes with policies
$router->get('/courses', function (Request $request, Response $response) {
    echo "Courses route.<br>";
    AuthPolicy::view($request);
    (new CourseController())->index($request, $response);
});
$router->get('/courses/create', function (Request $request, Response $response) {
    echo "Create Course route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new CourseController())->create($request, $response);
});
$router->post('/courses/create', function (Request $request, Response $response) {
    echo "Create Course POST route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new CourseController())->create($request, $response);
});
$router->get('/courses/edit', function (Request $request, Response $response) {
    echo "Edit Course route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new CourseController())->edit($request, $response);
});
$router->post('/courses/edit', function (Request $request, Response $response) {
    echo "Edit Course POST route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new CourseController())->edit($request, $response);
});
$router->post('/courses/delete', function (Request $request, Response $response) {
    echo "Delete Course route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::delete($request);
    (new CourseController())->delete($request, $response);
});

// User courses routes
$router->get('/user_courses', function (Request $request, Response $response) {
    echo "User Courses route.<br>";
    AuthPolicy::view($request);
    (new UserCourseController())->index($request, $response);
});
$router->get('/user_courses/create', function (Request $request, Response $response) {
    echo "Create User Course route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new UserCourseController())->create($request, $response);
});
$router->post('/user_courses/create', function (Request $request, Response $response) {
    echo "Create User Course POST route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::create($request);
    (new UserCourseController())->create($request, $response);
});
$router->get('/user_courses/edit', function (Request $request, Response $response) {
    echo "Edit User Course route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new UserCourseController())->edit($request, $response);
});
$router->post('/user_courses/edit', function (Request $request, Response $response) {
    echo "Edit User Course POST route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::edit($request);
    (new UserCourseController())->edit($request, $response);
});
$router->post('/user_courses/delete', function (Request $request, Response $response) {
    echo "Delete User Course route.<br>";
    AuthPolicy::view($request);
    CoursePolicy::delete($request);
    (new UserCourseController())->delete($request, $response);
});

// Fallback route
$router->fallback(function (Request $request, Response $response) {
    echo "Fallback route.<br>";
    $response->setStatusCode(404);
    $response->view('errors/404');
});

echo "Routes loaded.<br>";

return $router;
?>
