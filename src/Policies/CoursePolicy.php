<?php

namespace App\Policies;

use App\Core\Auth;
use App\Core\Request;
use App\Models\UserCourse;

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
     * Check if the user can create a user course.
     *
     * @param Request $request
     */
    public static function create(Request $request) {
        self::isAuthenticated($request);
    }

    /**
     * Check if the user can edit a user course.
     *
     * @param Request $request
     */
    public static function edit(Request $request) {
        self::isAuthenticated($request);
        self::isOwner($request);
    }

    /**
     * Check if the user can delete a user course.
     *
     * @param Request $request
     */
    public static function delete(Request $request) {
        self::isAuthenticated($request);
        self::isOwner($request);
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
     * Check if the authenticated user is the owner of the user course.
     *
     * @param Request $request
     */
    private static function isOwner(Request $request) {
        $user_course_id = $request->getParam('id') ?? $request->getBody()['id'];
        $user_course = UserCourse::find($user_course_id);
        if ($user_course && $user_course->user_id !== Auth::user()->id) {
            $request->redirect('/user_courses');
        }
    }
}
?>
