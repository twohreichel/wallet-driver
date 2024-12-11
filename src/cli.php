<?php

declare(strict_types=1);

use TWOH\Logger\Utilities\LogDirectoryUtility;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Services\WalletDriverService;
use Dotenv\Dotenv;
use TWOH\Logger\Traits\LoggerTrait;

require __DIR__ . '/../vendor/autoload.php';

new cli();

class cli
{
    use LoggerTrait;

    public function __construct()
    {
        LogDirectoryUtility::$logDirectory = __DIR__ . '/../logs/';

        // load .env file
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        try {
            $wallet = (new WalletDriverService(
                new Account(
                    $_ENV['HOST'],
                    $_ENV['USERNAME'],
                    $_ENV['PASSWORD'],
                    $_ENV['DRIVER']
                )
            ))->__invoke();
        } catch (ReflectionException|ValidationFailedException $e) {
            $this->error($e->getMessage());
        }
    }
}



