<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use MongoDB\Client;
use MongoDB\Database;
use MongoDB\Driver\ServerApi;
use TWOH\WalletDriver\Exceptions\NoConnectionException;
use TWOH\WalletDriver\Models\ConfigurationInterface;
use TWOH\WalletDriver\Queries\MongoDbQuery;
use TWOH\WalletDriver\Queries\QueryInterface;

class MongoDbDriver implements DriverInterface
{
    /**
     * @var ConfigurationInterface
     */
    private ConfigurationInterface $mongodbConfiguration;

    /**
     * @var Database
     */
    private Database $database;

    /**
     * @param ConfigurationInterface $mongodbConfiguration
     */
    public function __construct(
        ConfigurationInterface $mongodbConfiguration
    )
    {
        $this->mongodbConfiguration = $mongodbConfiguration;
    }

    /**
     * @return QueryInterface
     * @throws NoConnectionException
     */
    public function connect(): QueryInterface
    {
        $client = new Client(
            'mongodb://' . $this->mongodbConfiguration->getUsername() . ':' . $this->mongodbConfiguration->getPassword() . '@' . $this->mongodbConfiguration->getHost() . ':' . $this->mongodbConfiguration->getPort() ?? '27017',
            [],
            ['serverApi' => new ServerApi((string)ServerApi::V1)]
        );

        $this->database = $client->selectDatabase(
            $this->mongodbConfiguration->getDatabase()
        );

        // run connection test
        if ($this->test()) {
            throw new NoConnectionException('Ping MongoDB not successfully.');
        }

        return new MongoDbQuery(
            $this->database
        );
    }

    /**
     * @return bool
     */
    public function test(): bool
    {
        return $this->database->command(['ping' => 1])->isDead();
    }
}