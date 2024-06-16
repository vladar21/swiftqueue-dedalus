<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Models\UserCourse;
use App\Models\Course;

class UserCourseController extends BaseController {

    /**
     * Display the list of user courses.
     *
     * @param Request $request
     * @param Response $response
     */
    public function index(Request $request, Response $response) {
        $user_id = Auth::user()->id;
        $status = $request->getParam('status');
        $user_courses = UserCourse::allForUser($user_id);

        if ($status) {
            $user_courses = array_filter($user_courses, function ($course) use ($status) {
                return $course->status === $status;
            });
        }

        $response->view('user_courses/index', ['courses' => $user_courses]);
    }

    /**
     * Show the form for creating a new user course.
     *
     * @param Request $request
     * @param Response $response
     */
    public function create(Request $request, Response $response) {
        $user_id = Auth::user()->id;
echo "we in create";
        if ($request->isPost()) {
            $data = $request->getBody();
            $user_course = new UserCourse();
            $user_course->user_id = $user_id;
            $user_course->course_id = $data['course_id'];
            $user_course->name = $data['name'];
            $user_course->start_date = $data['start_date'];
            $user_course->end_date = $data['end_date'];
            $user_course->save();

            $response->redirect('/user_courses');
        } else {
            $courses = Course::all(); // Get the template courses
            $response->view('user_courses/create', ['courses' => $courses]);
        }
    }

    /**
     * Show the form for editing the specified user course.
     *
     * @param Request $request
     * @param Response $response
     */
    public function edit(Request $request, Response $response) {
        $id = $request->getParam('id');
        $user_course = UserCourse::find($id);

        if ($request->isPost()) {
            $data = $request->getBody();
            $user_course->name = $data['name'];
            $user_course->start_date = $data['start_date'];
            $user_course->end_date = $data['end_date'];
            $user_course->save();

            $response->redirect('/user_courses');
        } else {
            $response->view('user_courses/edit', ['course' => $user_course]);
        }
    }

    /**
     * Delete the specified user course.
     *
     * @param Request $request
     * @param Response $response
     */
    public function delete(Request $request, Response $response) {
        $id = $request->getBody()['id'];
        $user_course = UserCourse::find($id);

        if ($user_course) {
            $user_course->delete();
        }

        $response->redirect('/user_courses');
    }
}
?>
