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
| `php`                 | `wallet_driver_php83_container`     | PHP 8.3 Environment |

---

#### Setup Google Wallet
```php
<?php

declare(strict_types=1);

use TWOH\Logger\Utilities\LogDirectoryUtility;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;
use TWOH\WalletDriver\Models\WalletStyle;
use TWOH\WalletDriver\Services\WalletDriverService;
use TWOH\Logger\Traits\LoggerTrait;

require __DIR__ . '/../vendor/autoload.php';

new cli();

class cli
{
    use LoggerTrait;

    public function __construct()
    {
        LogDirectoryUtility::$logDirectory = __DIR__ . '/../logs/';

        try {
            /** @var string $generatedGoogleWallet contains a link that allows the end user to add the card directly to their Google Wallet */
            $generatedGoogleWalletUrl = (new WalletDriverService(
                new Account(
                    'your-issuer-id',
                    '',
                    '',
                    '',
                    'Google',
                    'Google Wallet API',
                    '/path/to/your-service-account.json',
                    'https://www.googleapis.com/auth/wallet_object.issuer',
                    '/path/to/private-key.pem',
                ),
                new Wallet(
                    'yourIssuerId.loyaltyClass1',
                    'yourIssuerId.loyaltyObject1',
                    'Beispiel-Unternehmen',
                    'Beispiel-Treueprogramm',
                    'active',
                    [
                        'accountId' => '123456789',
                        'accountName' => 'Max Mustermann',
                        'barcode' => [
                            'type' => 'qrCode',
                            'value' => '1234ABC5678',
                            'alternateText' => 'Scan mich!'
                        ]
                    ],
                    new WalletStyle(
                        // PNG, JPEG
                        // Pixel size: 200 x 200 Pixel.
                        // Aspect ratio: 2:1 (Breite:Höhe).
                        'https://www.example.com/images/logo.png',
                        // PNG, JPEG
                        // Pixel size: 1440 x 600 Pixel.
                        // Aspect ratio: 2,4:1 (Breite:Höhe).
                        'https://www.example.com/images/background.png',
                        '#4285F4',
                        '#FFFFFF',
                    )
                )
            ))->__invoke();
            
            $this->info($generatedGoogleWalletUrl);
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