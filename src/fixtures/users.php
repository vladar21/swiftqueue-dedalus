<?php

use App\Core\Database;
use App\Core\Config;

require_once __DIR__ . '/../../vendor/autoload.php';

Config::getInstance();

$db = (new Database())->getConnection();

$users = [
    [
        'username' => 'student',
        'password' => password_hash('studentpassword', PASSWORD_BCRYPT),
        'role' => 'student'
    ],
    [
        'username' => 'guest',
        'password' => password_hash('guestpassword', PASSWORD_BCRYPT),
        'role' => 'guest'
    ]
];

foreach ($users as $user) {
    $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
    $stmt->execute($user);
}

echo "Users table seeded successfully.\n";
