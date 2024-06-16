<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Models\Course;

class CourseController {

    /**
     * Display the list of courses.
     *
     * @param Request $request
     * @param Response $response
     */
    public function index(Request $request, Response $response) {
        $courses = Course::all();
        $response->view('courses/index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new course.
     *
     * @param Request $request
     * @param Response $response
     */
    public function create(Request $request, Response $response) {
        if ($request->isPost()) {
            $data = $request->getBody();
            $course = new Course();
            $course->name = $data['name'];
            $course->start_date = $data['start_date'];
            $course->end_date = $data['end_date'];
            $course->status = $data['status'];
            $course->save();

            $response->redirect('/courses');
        } else {
            $response->view('courses/create');
        }
    }

    /**
     * Show the form for editing the specified course.
     *
     * @param Request $request
     * @param Response $response
     */
    public function edit(Request $request, Response $response) {
        $id = $request->getParam('id');
        $course = Course::find($id);

        if ($request->isPost()) {
            $data = $request->getBody();
            $course->name = $data['name'];
            $course->start_date = $data['start_date'];
            $course->end_date = $data['end_date'];
            $course->status = $data['status'];
            $course->save();

            $response->redirect('/courses');
        } else {
            $response->view('courses/edit', ['course' => $course]);
        }
    }

    /**
     * Delete the specified course.
     *
     * @param Request $request
     * @param Response $response
     */
    public function delete(Request $request, Response $response) {
        $id = $request->getBody()['id'];
        $course = Course::find($id);

        if ($course) {
            $course->delete();
        }

        $response->redirect('/courses');
    }
}
?>
