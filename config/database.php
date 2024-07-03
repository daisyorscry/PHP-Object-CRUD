<?php

function getDatabaseConfig()
{
    return [
        "database" => [
            "dev" => [
                "url" => "mysql:host=localhost:3306;dbname=programing",
                "username" => "root",
                "password" => "123"
            ],

            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=programing-prod",
                "username" => "root",
                "password" => "123"
            ]
        ]
    ];
}

$connection = getDatabaseConfig();

$selectDatabase = 'dev';

try {
    $pdo = new PDO(
        $connection['database'][$selectDatabase]['url'],
        $connection['database'][$selectDatabase]['username'],
        $connection['database'][$selectDatabase]['password'],
    );

    echo "sukses terkoneksi database" . PHP_EOL;
} catch (PDOException $error) {
    echo "erro databse : " . $error . PHP_EOL;
} 