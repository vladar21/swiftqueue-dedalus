<?php

use App\Core\Database;
use App\Core\Config;

require_once __DIR__ . '/../../vendor/autoload.php'; // Обновленный путь

// Ensure Config is loaded
Config::getInstance();

$db = (new Database())->getConnection();

$courses = [
    [
        'name' => 'PHP for Beginners',
        'start_date' => '2024-06-20 09:00:00',
        'end_date' => '2024-06-20 17:00:00',
        'status' => 'active'
    ],
    [
        'name' => 'Advanced JavaScript',
        'start_date' => '2024-07-15 09:00:00',
        'end_date' => '2024-07-15 17:00:00',
        'status' => 'inactive'
    ]
];

foreach ($courses as $course) {
    $stmt = $db->prepare("INSERT INTO courses (name, start_date, end_date, status) VALUES (:name, :start_date, :end_date, :status)");
    $stmt->execute($course);
}

echo "Courses table seeded successfully.\n";
