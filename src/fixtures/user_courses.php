<?php

use App\Core\Database;
use App\Core\Config;

require_once __DIR__ . '/../../vendor/autoload.php';

Config::getInstance();

$db = (new Database())->getConnection();

$user_courses = [
    [
        'user_id' => 1,
        'course_id' => 1,
        'name' => 'Something like PHP',
        'start_date' => '2024-09-01 08:00:00',
        'end_date' => '2024-12-15 10:00:00',
    ],
    [
        'user_id' => 1,
        'course_id' => 2,
        'name' => 'JavaScript for me',
        'start_date' => '2024-09-01 08:00:00',
        'end_date' => '2024-12-15 10:00:00',
    ],
    [
        'user_id' => 2,
        'course_id' => 1,
        'name' => 'I want to know PHP',
        'start_date' => '2024-08-01 12:30:00',
        'end_date' => '2024-10-15 14:00:00',
    ]
];

foreach ($user_courses as $user_course) {
    $stmt = $db->prepare("INSERT INTO user_courses (user_id, course_id, name, start_date, end_date) VALUES (:user_id, :course_id, :name, :start_date, :end_date)");
    $stmt->execute($user_course);
}

echo "User courses table seeded successfully.\n";
?>