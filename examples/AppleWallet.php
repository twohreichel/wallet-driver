<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use TWOH\Logger\Utilities\LogDirectoryUtility;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;
use TWOH\WalletDriver\Models\WalletStyle;
use TWOH\WalletDriver\Services\WalletDriverService;

require __DIR__ . '/../vendor/autoload.php';

LogDirectoryUtility::$logDirectory = __DIR__ . '/../logs/';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$pkPassPath = __DIR__ . '/apple_settings/pkpass/';

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
            __DIR__ . '/apple_settings/certificate/Certificate.p12',
            $_ENV['APPLE_CERTIFICATE_PASSWORD'],
            $pkPassPath,
            $_ENV['APPLE_PASS_TYPE_ID'],
            $_ENV['APPLE_TEAM_ID'],
            false
        ),
        new Wallet(
            '',
            '',
            'Beispiel-Unternehmen',
            'Beispiel-Treueprogramm',
            'generic',
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
            [
                'primaryFields' => [
                    [
                        'key' => 'name',
                        'label' => 'Name',
                        'value' => $this->getWallet()->getWalletData()['accountName'],
                    ],
                ],
                'backFields' => [
                    [
                        'key' => 'id',
                        'label' => 'ID',
                        'value' => $this->getWallet()->getWalletData()['accountId'],
                    ],
                ],
            ],
            new WalletStyle(
                // PNG
                // Pixel size: 160 x 50 Pixel.
                // Aspect ratio: 2:1 (Breite:Höhe).
                __DIR__ . '/apple_settings/images/logo.png',
                // PNG
                // Pixel size: 160 x 50 Pixel.
                // Aspect ratio: 2,4:1 (Breite:Höhe).
                __DIR__ . '/apple_settings/images/background.png',
                // PNG
                // Pixel size: 29 x 29 Pixel.
                // Aspect ratio: 1:1 (Breite:Höhe).
                __DIR__ . '/apple_settings/images/icon.png',
                __DIR__ . '/apple_settings/images/background.png',
                '',
                '',
                '',
                '',
                '',
                'rgb(32,110,247)',
                'rgb(255,255,255)',
            )
        )
    ))->__invoke();

    var_dump('You can find your stored file in the following directory: ' . $generatedAppleWalletUrl);
} catch (ValidationFailedException|JsonException|ReflectionException $e) {
    var_dump($e->getMessage());
}