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
        'status' => 'active'
    ],
    [
        'name' => 'Advanced JavaScript',
        'status' => 'inactive'
    ],
    [
        'name' => 'Node.js for Beginners',
        'status' => 'active'
    ],
    [
        'name' => 'TailwindCSS and JavaScript',
        'status' => 'inactive'
    ]
];

foreach ($courses as $course) {
    $stmt = $db->prepare("INSERT INTO courses (name, status) VALUES (:name, :status)");
    $stmt->execute($course);
}

echo "Courses table seeded successfully.\n";
