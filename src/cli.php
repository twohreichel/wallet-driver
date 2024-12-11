<?php

declare(strict_types=1);

use TWOH\WalletDriver\Models\Configuration;
use TWOH\WalletDriver\Services\DatabaseDriverService;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// load .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$query = (new DatabaseDriverService(
    new Configuration(
        'mongodb',
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD'],
        (int)$_ENV['DB_PORT'],
        $_ENV['DB_DATABASE']
    ),
    'MongoDbDriver'
))->__invoke();

$query->insertOne(
    'test',
    [
        'name' => 'John Doe',
        'age' => 42,
        'email' => 'j.doe@example.org'
    ]
);