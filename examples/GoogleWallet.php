<?php

declare(strict_types=1);

use TWOH\Logger\Utilities\LogDirectoryUtility;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;
use TWOH\WalletDriver\Models\WalletStyle;
use TWOH\WalletDriver\Services\WalletDriverService;

require __DIR__ . '/../vendor/autoload.php';

LogDirectoryUtility::$logDirectory = __DIR__ . '/../logs/';

try {
    // $generatedGoogleWallet contains a link that allows the end user to add the card directly to their Google Wallet
    $generatedGoogleWalletUrl = (new WalletDriverService(
        new Account(
            'your-issuer-id',
            'Google',
            'Application',
            __DIR__ . '/google_settings/skilful-alpha-446310-a1-1e74e4108812.json',
            'https://www.googleapis.com/auth/wallet_object.issuer',
            __DIR__ . '/google_settings/private-key.pem',
            '',
            '',
            '',
            '',
            ''
        ),
        new Wallet(
            'yourIssuerId.loyaltyClass1',
            'yourIssuerId.loyaltyObject1',
            'Beispiel-Unternehmen',
            'Beispiel-Treueprogramm',
            'APPROVED',
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
                // PNG
                // Pixel size: 200 x 200 Pixel.
                // Aspect ratio: 2:1 (Breite:Höhe).
                'https://www.drv-tic.de/fileadmin/Travel_Industry_Card-Partner/Seminare/DRV-Basislogo_WEB.png',
                // PNG
                // Pixel size: 1440 x 600 Pixel.
                // Aspect ratio: 2,4:1 (Breite:Höhe).
                'https://www.drv-tic.de/fileadmin/Travel_Industry_Card-Partner/Seminare/DRV-Basislogo_WEB.png',
                'https://www.drv-tic.de/fileadmin/Travel_Industry_Card-Partner/Seminare/DRV-Basislogo_WEB.png',
                '#4285F4',
                '#FFFFFF',
            )
        )
    ))->__invoke();

    var_dump($generatedGoogleWalletUrl);
} catch (ValidationFailedException|JsonException|ReflectionException $e) {
    var_dump($e->getMessage());
}