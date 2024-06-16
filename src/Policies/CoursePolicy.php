<?php

namespace App\Policies;

use App\Core\Auth;
use App\Core\Request;

class CoursePolicy {

    /**
     * Check if the user can view courses.
     *
     * @param Request $request
     */
    public static function view(Request $request) {
        self::isAuthenticated($request);
    }

    /**
     * Check if the user can create a course.
     *
     * @param Request $request
     */
    public static function create(Request $request) {
        self::isAuthenticated($request);
        self::isAuthorized($request, ['admin']);
    }

    /**
     * Check if the user can edit a course.
     *
     * @param Request $request
     */
    public static function edit(Request $request) {
        self::isAuthenticated($request);
        self::isAuthorized($request, ['admin']);
    }

    /**
     * Check if the user can delete a course.
     *
     * @param Request $request
     */
    public static function delete(Request $request) {
        self::isAuthenticated($request);
        self::isAuthorized($request, ['admin']);
    }

    /**
     * Check if the user is authenticated.
     *
     * @param Request $request
     */
    private static function isAuthenticated(Request $request) {
        if (!Auth::check()) {
            $request->redirect('/login');
        }
    }

    /**
     * Check if the user has the necessary role.
     *
     * @param Request $request
     * @param array $roles
     */
    private static function isAuthorized(Request $request, array $roles) {
        if (!in_array(Auth::role(), $roles)) {
            $request->redirect('/courses');
        }
    }
}
?>
