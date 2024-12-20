<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Services;

use TWOH\WalletDriver\Drivers\DriverInterface;
use TWOH\Logger\Traits\LoggerTrait;
use TWOH\Logger\Traits\OutputTrait;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;

final class WalletDriverService
{
    use LoggerTrait;
    use OutputTrait;

    /**
     * @var DriverInterface
     */
    private DriverInterface $driver;

    /**
     * @var Account
     */
    private Account $account;

    /**
     * @var Wallet
     */
    private Wallet $wallet;

    /**
     * @var string
     */
    private const string NAMESPACE_PREFIX = 'TWOH\\WalletDriver\\Drivers\\';

    /**
     * @param Account $account
     * @param Wallet $wallet
     * @throws ValidationFailedException
     */
    public function __construct(
        Account $account,
        Wallet $wallet
    )
    {
        if ($account->getDriver() === '') {
            throw new ValidationFailedException('No Driver set. Please at a Driver.');
        }

        $driver = $account->getDriver();
        $fullyQualifiedClassName = self::NAMESPACE_PREFIX . $driver . 'WalletDriver';

        /** @var DriverInterface $driver */
        $this->driver = (new $fullyQualifiedClassName());
        $this->driver->setAccount($account);
        $this->driver->setWallet($wallet);
    }

    /**
     * @return string
     */
    public function __invoke(): string
    {
        return $this->driver->buildWallet();
    }
}