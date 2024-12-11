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
use TWOH\WalletDriver\Models\Configuration;
use TWOH\WalletDriver\Services\DatabaseDriverService;

$query = (new DatabaseDriverService(
    new Configuration(
        'mongodb',
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD'],
        (int)$_ENV['DB_PORT'],
        $_ENV['DB_DATABASE']
    ),
    'MongoDbDriver'
))->__invoke();
```

---

#### Running Tests
To verify that the tests are passing, run the following command:

```shell
vendor/bin/phpunit
```

---

#### Logging
This project uses its own `LoggerTrait` class. You can integrate it into your classes to log messages as follows:

```php
use LoggerTrait;

$this->info('Your message here');
$this->warning('Your message here');
$this->error('Your message here');
```

The log files will be stored in the `logs` folder.