<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class Account
{
    /**
     * @NotEmpty
     * @IsMail
     * @var string $username The variable that holds the username value.
     */
    protected string $username = '';

    /**
     * @NotEmpty
     * @StrengthPassword
     * @var string $password The variable that holds the password value.
     */
    protected string $password = '';

    /**
     * @NotEmpty
     * @var string $host The variable that holds the host value.
     */
    protected string $host = '';

    /**
     * @NotEmpty
     * @var string $driver The variable that holds the driver that need to be called for wallet generation.
     */
    protected string $driver = '';

    /**
     * @var Connection $connection The variable that holds the connection of the account.
     */
    protected Connection $connection;

    /**
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $driver
     */
    public function __construct(
        string $host,
        string $username,
        string $password,
        string $driver
    )
    {
        $this->setHost($host);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setDriver($driver);
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

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }

    public function setConnection(Connection $connection): void
    {
        $this->connection = $connection;
    }
}