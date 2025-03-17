<?php

namespace TWOH\WalletDriver\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use TWOH\WalletDriver\Exceptions\ValidationFailedException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;
use TWOH\WalletDriver\Models\WalletStyle;
use TWOH\WalletDriver\Services\WalletDriverService;

class GoogleWalletTest extends TestCase
{
    /**
     * @throws ReflectionException
     * @throws ValidationFailedException
     * @throws \JsonException
     */
    public function testGeneratedGoogleWalletUrlUsingRealObjects(): void
    {
        $account = new Account(
            'your-issuer-id',
            'Google',
            'Application',
            '/path/to/your-service-account.json',
            'https://www.googleapis.com/auth/wallet_object.issuer',
            '/path/to/private-key.pem',
            '',
            '',
            '',
            '',
            ''
        );

        $walletStyle = new WalletStyle(
            'https://www.example.com/images/logo.png',
            'https://www.example.com/images/background.png',
            '',
            '#4285F4',
            '#FFFFFF',
        );

        $wallet = new Wallet(
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
            $walletStyle
        );

        $walletDriverService = new WalletDriverService($account, $wallet);
        $generatedGoogleWalletUrl = $walletDriverService->__invoke();

        $this->assertNotNull($generatedGoogleWalletUrl);
        $this->assertIsString($generatedGoogleWalletUrl);
    }
}