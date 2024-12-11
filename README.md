<p style="text-align: center;"><img src="/assets/icons/package.svg" width="200" alt="TWOH Logo"></p>

<p style="text-align: center;">
<img src="/assets/icons/build.svg" alt="Build Status">
<img src="/assets/icons/version.svg" alt="Latest Stable Version">
<img src="/assets/icons/license.svg" alt="License">
</p>

### About Wallet-Driver

---

This project includes a basic Driver to interact with different Walletsystems like Apple and Google.

### Requirements

---

- PHP 8.3 or higher
- Composer

### Installation

---

````shell
composer req twoh/wallet-driver
````

### Usage

---

#### Starting Docker

To start the Docker containers, navigate to the project directory and use the following command:

```shell
docker-compose up -d --build
```

---

#### Docker Containers

| Docker Container Name | Final Container Name                 | Purpose             |
|-----------------------|--------------------------------------|---------------------|
| `php`                 | `database_driver_php83_container`     | PHP 8.3 Environment |

---

#### Setup Connection
```php
<?php

declare(strict_types=1);

use TWOH\Logger\Utilities\LogDirectoryUtility;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Services\WalletDriverService;
use Dotenv\Dotenv;
use TWOH\Logger\Traits\LoggerTrait;

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
```

---

#### Running Tests
To verify that the tests are passing, run the following command:

```shell
vendor/bin/phpunit
```