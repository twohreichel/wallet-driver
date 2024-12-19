<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Services;

use Firebase\JWT\JWT;
use TWOH\WalletDriver\Exceptions\JWTTokenException;
use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;

class JWTService
{
    /**
     * @param Account $account
     * @param Wallet $wallet
     * @return string|null
     * @throws JWTTokenException
     */
    public function generateGoogleLinkToAddWalletToDevice(
        Account $account,
        Wallet $wallet,
    ): ?string
    {
        $jwt = $this->generateGoogleJWT(
            $account,
            $wallet,
        );

        if (!empty($jwt)) {
            return 'https://pay.google.com/gp/v/save/' . $jwt;
        }

        throw new JWTTokenException('JWT generation failed');
    }

    /**
     * @param Account $account
     * @param Wallet $wallet
     * @return string
     */
    private function generateGoogleJWT(
        Account $account,
        Wallet $wallet,
    ): string
    {
        return JWT::encode(
            [
                'iss' => $account->getIssuerId(),
                'aud' => 'google',
                'typ' => 'savetowallet',
                'payload' => [
                    'loyaltyObjects' => [
                        [
                            'id' => $wallet->getObjectId()
                        ]
                    ]
                ]
            ],
            file_get_contents($account->getPrivateKeyPath()),
            'RS256'
        );
    }
}