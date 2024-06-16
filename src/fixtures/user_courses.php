<?php

use App\Core\Database;
use App\Core\Config;
use App\Models\User;
use App\Models\Course;

require_once __DIR__ . '/../../vendor/autoload.php';

Config::getInstance();

$db = (new Database())->getConnection();

// Get user and course data
$users = User::all();
$courses = Course::all();

$user_courses = [
    [
        'user_id' => $users[0]->id,
        'course_id' => $courses[0]->id,
        'name' => 'Mathematics - Student Version',
        'start_date' => '2024-09-01 08:00:00',
        'end_date' => '2024-12-15 10:00:00',
        'status' => 'active'
    ],
    [
        'user_id' => $users[1]->id,
        'course_id' => $courses[1]->id,
        'name' => 'Physics - Guest Version',
        'start_date' => '2024-09-01 08:00:00',
        'end_date' => '2024-12-15 10:00:00',
        'status' => 'active'
    ]
];

foreach ($user_courses as $user_course) {
    $stmt = $db->prepare("INSERT INTO user_courses (user_id, course_id, name, start_date, end_date, status) VALUES (:user_id, :course_id, :name, :start_date, :end_date, :status)");
    $stmt->execute($user_course);
}

echo "User courses table seeded successfully.\n";
