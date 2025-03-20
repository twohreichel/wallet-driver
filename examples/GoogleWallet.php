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

try {
    // unique issuer id
    $issuerId = '3388000000022876557';
    $classId = 'eTIC';

    // $generatedGoogleWallet contains a link that allows the end user to add the card directly to their Google Wallet
    $generatedGoogleWalletUrl = (new WalletDriverService(
        new Account(
            $issuerId,
            'Google',
            'Application',
            __DIR__ . '/google_settings/friendly-sensor-453509-c2-e232de8f5fd0.json',
            'https://www.googleapis.com/auth/wallet_object.issuer',
            __DIR__ . '/google_settings/private-key.pem',
            '',
            '',
            '',
            '',
            '',
            false
        ),
        new Wallet(
            $issuerId . '.' . $classId . 'Class',
            $issuerId . '.' . $classId . 'Object',
            'Beispiel-Unternehmen',
            'Beispiel-Treueprogramm',
            'loyalty',
            'UNDER_REVIEW',
            [
                'accountId' => '123456789',
                'accountName' => 'Max Mustermann',
                'barcode' => [
                    'type' => '',
                    'value' => '',
                    'alternateText' => ''
                ]
            ],
            [],
            new WalletStyle(
                // PNG
                // Pixel size: 200 x 200 Pixel.
                // Aspect ratio: 2:1 (Breite:Höhe).
                'https://www.drv-tic.de/fileadmin/eTic/logo.png',
                // PNG
                // Pixel size: 1440 x 600 Pixel.
                // Aspect ratio: 2,4:1 (Breite:Höhe).
                'https://www.drv-tic.de/fileadmin/eTic/background.png',
                'https://www.drv-tic.de/fileadmin/eTic/icon.png',
                '',
                '',
                '#4285F4',
                '#FFFFFF',
            )
        )
    ))->__invoke();

    var_dump($generatedGoogleWalletUrl);
} catch (ValidationFailedException|JsonException|ReflectionException $e) {
    var_dump($e->getMessage());
}