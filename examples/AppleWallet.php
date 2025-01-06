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
    // $generatedAppleWalletUrl contains a link that allows the end user to add the card directly to their Apple Wallet
    $generatedAppleWalletUrl = (new WalletDriverService(
        new Account(
            '',
            'Apple',
            'Application',
            '',
            '',
            '',
            __DIR__ . '/certificate/Certificates.p12',
            'password',
            __DIR__ . '/pkpass/',
            'pass.com.yourcompany.loyalty',
            'KN44X8ZLNC'
        ),
        new Wallet(
            '',
            '',
            'Beispiel-Unternehmen',
            'Beispiel-Treueprogramm',
            'active',
            [
                'accountId' => '123456789',
                'accountName' => 'Max Mustermann',
                'barcode' => [

                    'type' => 'PKBarcodeFormatPDF417',
                    'value' => '1234ABC5678',
                    'alternateText' => 'Scan mich!'
                ]
            ],
            new WalletStyle(
                // PNG
                // Pixel size: 160 x 50 Pixel.
                // Aspect ratio: 2:1 (Breite:Höhe).
                __DIR__ . '/apple_settings/images/example.png',
                // PNG
                // Pixel size: 160 x 50 Pixel.
                // Aspect ratio: 2,4:1 (Breite:Höhe).
                __DIR__ . '/apple_settings/images/example.png',
                // PNG
                // Pixel size: 29 x 29 Pixel.
                // Aspect ratio: 1:1 (Breite:Höhe).
                __DIR__ . '/apple_settings/images/example.png',
                'rgb(32,110,247)',
                'rgb(255,255,255)',
            )
        )
    ))->__invoke();

    var_dump($generatedAppleWalletUrl);
} catch (ValidationFailedException|JsonException|ReflectionException $e) {
    var_dump($e->getMessage());
}