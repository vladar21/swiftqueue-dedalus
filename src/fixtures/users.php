<?php

use App\Core\Database;
use App\Core\Config;

require_once __DIR__ . '/../../vendor/autoload.php';

Config::getInstance();

$db = (new Database())->getConnection();

$users = [
    [
        'username' => 'student1',
        'password' => password_hash('pass1', PASSWORD_BCRYPT),
        'role' => 'student'
    ],
    [
        'username' => 'student2',
        'password' => password_hash('pass2', PASSWORD_BCRYPT),
        'role' => 'student'
    ],
    [
        'username' => 'guest',
        'password' => password_hash('pass', PASSWORD_BCRYPT),
        'role' => 'guest'
    ]
];

foreach ($users as $user) {
    $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
    $stmt->execute($user);
}

echo "Users table seeded successfully.\n";
