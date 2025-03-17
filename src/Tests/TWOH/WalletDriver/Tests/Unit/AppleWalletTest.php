<?php

namespace TWOH\WalletDriver\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;
use TWOH\WalletDriver\Models\WalletStyle;
use TWOH\WalletDriver\Services\WalletDriverService;

class AppleWalletTest extends TestCase
{
    /**
     * @throws ReflectionException
     * @throws ValidationFailedException
     * @throws \JsonException
     */
    public function testGeneratedAppleWalletUrlUsingRealObjects(): void
    {
        $account = new Account(
            '',
            'Apple',
            'Application',
            '',
            '',
            '',
            '../Certificates.p12',
            'password',
            '/var/www/html/pkpass/',
            'pass.com.yourcompany.loyalty',
            'KN44X8ZLNC'
        );

        $walletStyle = new WalletStyle(
            'https://www.example.com/images/logo.png',
            'https://www.example.com/images/background.png',
            'https://www.example.com/images/icon.png',
            'rgb(32,110,247)',
            'rgb(255,255,255)'
        );

        $wallet = new Wallet(
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
            $walletStyle
        );

        $walletDriverService = new WalletDriverService($account, $wallet);
        $generatedAppleWalletUrl = $walletDriverService->__invoke();

        $this->assertNotNull($generatedAppleWalletUrl);
        $this->assertIsString($generatedAppleWalletUrl);
    }
}