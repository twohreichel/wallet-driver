<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Services;

use TWOH\Validator\Examples\UserValidator;
use TWOH\WalletDriver\Drivers\DriverInterface;
use TWOH\Logger\Traits\LoggerTrait;
use TWOH\Logger\Traits\OutputTrait;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;

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
     * @var string
     */
    private const string NAMESPACE_PREFIX = 'TWOH\\WalletDriver\\Drivers\\';

    /**
     * @param Account $account
     * @throws ValidationFailedException
     * @throws \ReflectionException
     */
    public function __construct(
        Account $account
    )
    {
        $validator = new UserValidator();
        $errors = $validator->validate($account);

        if (count($errors) > 0) {
            throw new ValidationFailedException('Account validation failed: ' . implode(', ', $errors));
        }

        $driver = $account->getDriver();
        $fullyQualifiedClassName = self::NAMESPACE_PREFIX . $driver . 'WalletDriver';

        /** @var DriverInterface $driver */
        $this->driver = (new $fullyQualifiedClassName());
        $this->driver->setAccount($account);
    }

    /**
     * @return string
     */
    public function __invoke(): string
    {
        return $this->driver->buildWallet();
    }
}