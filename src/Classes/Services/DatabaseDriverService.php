<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Services;

use TWOH\WalletDriver\Drivers\DriverInterface;
use TWOH\WalletDriver\Exceptions\NoConnectionException;
use TWOH\WalletDriver\Models\ConfigurationInterface;
use TWOH\WalletDriver\Queries\QueryInterface;
use TWOH\Logger\Traits\LoggerTrait;
use TWOH\Logger\Traits\OutputTrait;

final class DatabaseDriverService
{
    use LoggerTrait;
    use OutputTrait;

    /**
     * @var DriverInterface
     */
    private DriverInterface $driver;

    /**
     * @var string
     */
    private const string NAMESPACE_PREFIX = 'TWOH\\WalletDriver\\Drivers\\';

    /**
     * @param ConfigurationInterface $configuration
     * @param string $driverName
     */
    public function __construct(
        ConfigurationInterface $configuration,
        string $driverName = 'MongoDbDriver'
    )
    {
        $fullyQualifiedClassName = self::NAMESPACE_PREFIX . $driverName;

        try {
            /** @var DriverInterface $driver */
            $this->driver = (new $fullyQualifiedClassName(
                $configuration
            ));
        } catch (NoConnectionException $e) {
            $this->error($e->getMessage());
            $this->outputException($e);
        }
    }

    /**
     * @return QueryInterface
     */
    public function __invoke(): QueryInterface
    {
        return $this->driver->connect();
    }
}