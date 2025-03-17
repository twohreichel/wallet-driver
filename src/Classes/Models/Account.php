<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class Account
{
    /**
     * @var string The variable that holds the issuerId value.
     */
    private string $issuerId = '';

    /**
     * @NotEmpty
     * @var string $driver The variable that holds the driver that need to be called for wallet generation.
     */
    private string $driver = '';

    /**
     * @var Connection $connection The variable that holds the connection of the account.
     */
    private Connection $connection;

    /**
     * @var string $applicationName The variable that holds the application name of the account.
     */
    private string $applicationName = '';

    /**
     * @var string $authConfig The variable that holds the auth config of the account.
     */
    private string $authConfig = '';

    /**
     * @var string $scope The variable that holds the scope of the account.
     */
    private string $scope = '';

    /**
     * @var string $privateKeyPath The variable that holds the privateKeyPath of the account.
     */
    private string $privateKeyPath = '';

    /**
     * @var string $appleCertificatePath The variable that holds the apple certificate path of the account.
     */
    private string $appleCertificatePath = '';

    /**
     * @var string $appleCertificatePassword The variable that holds the apple certificate password of the account.
     */
    private string $appleCertificatePassword = '';

    /**
     * @var string $applePKPassStorePath The variable that holds the path where to store the pkpass file of the account.
     */
    private string $applePKPassStorePath = '';

    /**
     * @var string $applePassTypeIdentifier The variable that holds the applePassTypeIdentifier of the account.
     */
    private string $applePassTypeIdentifier = '';

    /**
     * @var string $appleTeamIdentifier The variable that holds the appleTeamIdentifier of the account.
     */
    private string $appleTeamIdentifier = '';

    /**
     * @var bool $downloadable The variable that holds the downloadable status of the account.
     */
    private bool $downloadable = false;

    /**
     * @param string $issuerId
     * @param string $driver
     * @param string $applicationName
     * @param string $authConfig
     * @param string $scope
     * @param string $privateKeyPath
     * @param string $appleCertificatePath
     * @param string $appleCertificatePassword
     * @param string $applePKPassStorePath
     * @param string $applePassTypeIdentifier
     * @param string $appleTeamIdentifier
     */
    public function __construct(
        string $issuerId,
        string $driver,
        string $applicationName,
        string $authConfig,
        string $scope,
        string $privateKeyPath,
        string $appleCertificatePath,
        string $appleCertificatePassword,
        string $applePKPassStorePath,
        string $applePassTypeIdentifier,
        string $appleTeamIdentifier,
        bool $downloadable
    )
    {
        $this->setIssuerId($issuerId);
        $this->setDriver($driver);
        $this->setApplicationName($applicationName);
        $this->setAuthConfig($authConfig);
        $this->setScope($scope);
        $this->setPrivateKeyPath($privateKeyPath);
        $this->setAppleCertificatePath($appleCertificatePath);
        $this->setAppleCertificatePassword($appleCertificatePassword);
        $this->setApplePKPassStorePath($applePKPassStorePath);
        $this->setApplePassTypeIdentifier($applePassTypeIdentifier);
        $this->setAppleTeamIdentifier($appleTeamIdentifier);
        $this->setDownloadable($downloadable);
    }

    public function getIssuerId(): string
    {
        return $this->issuerId;
    }

    public function setIssuerId(string $issuerId): void
    {
        $this->issuerId = $issuerId;
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

    public function getAppleCertificatePath(): string
    {
        return $this->appleCertificatePath;
    }

    public function setAppleCertificatePath(string $appleCertificatePath): void
    {
        $this->appleCertificatePath = $appleCertificatePath;
    }

    public function getAppleCertificatePassword(): string
    {
        return $this->appleCertificatePassword;
    }

    public function setAppleCertificatePassword(string $appleCertificatePassword): void
    {
        $this->appleCertificatePassword = $appleCertificatePassword;
    }

    public function getApplePKPassStorePath(): string
    {
        return $this->applePKPassStorePath;
    }

    public function setApplePKPassStorePath(string $applePKPassStorePath): void
    {
        $this->applePKPassStorePath = $applePKPassStorePath;
    }

    public function getApplePassTypeIdentifier(): string
    {
        return $this->applePassTypeIdentifier;
    }

    public function setApplePassTypeIdentifier(string $applePassTypeIdentifier): void
    {
        $this->applePassTypeIdentifier = $applePassTypeIdentifier;
    }

    public function getAppleTeamIdentifier(): string
    {
        return $this->appleTeamIdentifier;
    }

    public function setAppleTeamIdentifier(string $appleTeamIdentifier): void
    {
        $this->appleTeamIdentifier = $appleTeamIdentifier;
    }

    public function isDownloadable(): bool
    {
        return $this->downloadable;
    }

    public function setDownloadable(bool $downloadable): void
    {
        $this->downloadable = $downloadable;
    }
}