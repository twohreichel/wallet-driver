<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class Account
{
    /**
     * @var string The variable that holds the issuerId value.
     */
    protected string $issuerId = '';

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
     * @NotEmpty
     * @var string $driver The variable that holds the driver that need to be called for wallet generation.
     */
    protected string $driver = '';

    /**
     * @var Connection $connection The variable that holds the connection of the account.
     */
    protected Connection $connection;

    /**
     * @var string $applicationName The variable that holds the application name of the account.
     */
    protected string $applicationName = '';

    /**
     * @var string $authConfig The variable that holds the auth config of the account.
     */
    protected string $authConfig = '';

    /**
     * @var string $scope The variable that holds the scope of the account.
     */
    protected string $scope = '';

    /**
     * @var string $privateKeyPath The variable that holds the privateKeyPath of the account.
     */
    protected string $privateKeyPath = '';

    /**
     * @param string $issuerId
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $driver
     * @param string $applicationName
     * @param string $authConfig
     * @param string $scope
     * @param string $privateKeyPath
     */
    public function __construct(
        string $issuerId,
        string $host,
        string $username,
        string $password,
        string $driver,
        string $applicationName,
        string $authConfig,
        string $scope,
        string $privateKeyPath
    )
    {
        $this->setIssuerId($issuerId);
        $this->setHost($host);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setDriver($driver);
        $this->setApplicationName($applicationName);
        $this->setAuthConfig($authConfig);
        $this->setScope($scope);
        $this->setPrivateKeyPath($privateKeyPath);
    }

    public function getIssuerId(): string
    {
        return $this->issuerId;
    }

    public function setIssuerId(string $issuerId): void
    {
        $this->issuerId = $issuerId;
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

    public function getApplicationName(): string
    {
        return $this->applicationName;
    }

    public function setApplicationName(string $applicationName): void
    {
        $this->applicationName = $applicationName;
    }

    public function getAuthConfig(): string
    {
        return $this->authConfig;
    }

    public function setAuthConfig(string $authConfig): void
    {
        $this->authConfig = $authConfig;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

    public function getPrivateKeyPath(): string
    {
        return $this->privateKeyPath;
    }

    public function setPrivateKeyPath(string $privateKeyPath): void
    {
        $this->privateKeyPath = $privateKeyPath;
    }
}