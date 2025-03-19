<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Services;

use TWOH\Validator\Examples\UserValidator;
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
    private const NAMESPACE_PREFIX = 'TWOH\\WalletDriver\\Drivers\\';

    /**
     * @param Account $account
     * @param Wallet $wallet
     * @throws ValidationFailedException
     * @throws \ReflectionException
     * @throws \JsonException
     */
    public function __construct(
        Account $account,
        Wallet $wallet
    )
    {
        $validator = new UserValidator();
        $errors = $validator->validate($account);

        if (count($errors) > 0) {
            throw new ValidationFailedException(json_encode($errors, JSON_THROW_ON_ERROR));
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