<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class Configuration implements ConfigurationInterface
{
    /**
     * @var string $username The variable that holds the username value.
     */
    protected string $username = '';

    /**
     * @var string $password The variable that holds the password value.
     */
    protected string $password = '';

    /**
     * @var string $host The variable that holds the host value.
     */
    protected string $host = '';

    /**
     * @var int $port The variable that holds the port number.
     */
    protected int $port = 0;

    /**
     * @var string $database The variable that holds the name of the database.
     */
    protected string $database = '';

    /**
     * @param string $host
     * @param string $username
     * @param string $password
     * @param int $port
     * @param string $database
     */
    public function __construct(
        string $host,
        string $username,
        string $password,
        int $port,
        string $database,
    )
    {
        $this->setHost($host);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setPort($port);
        $this->setDatabase($database);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function setDatabase(string $database): void
    {
        $this->database = $database;
    }
}