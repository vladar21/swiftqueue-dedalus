<?php

use App\Core\Database;
use App\Core\Config;

require_once __DIR__ . '/../../vendor/autoload.php';

Config::getInstance();

$db = (new Database())->getConnection();

$users = [
    [
        'username' => 'admin',
        'password' => password_hash('adminpassword', PASSWORD_BCRYPT),
        'role' => 'admin'
    ],
    [
        'username' => 'user',
        'password' => password_hash('userpassword', PASSWORD_BCRYPT),
        'role' => 'user'
    ]
];

foreach ($users as $user) {
    $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
    $stmt->execute($user);
}

echo "Users table seeded successfully.\n";
