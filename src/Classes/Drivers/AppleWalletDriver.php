<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Connection;
use TWOH\WalletDriver\Models\Wallet;

class AppleWalletDriver implements DriverInterface
{
    /**
     * @var Account
     */
    protected Account $account;

    /**
     * @var Wallet
     */
    protected Wallet $wallet;

    /**
     * @return string
     */
    public function buildWallet(): string
    {
        $this->connect();

        return 'Apple Wallet';
    }

    /**
     * @return Account
     */
    public function connect(): Account
    {
        $account = $this->getAccount();
        $account->setConnection(new Connection(
            'token'
        ));

        $this->setAccount($account);
    }

    /**
     * @param Account $account
     * @return void
     */
    public function setAccount(Account $account): void
    {
        $this->account = $account;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Wallet $wallet
     * @return void
     */
    public function setWallet(Wallet $wallet): void
    {
        $this->wallet = $wallet;
    }

    /**
     * @return Wallet
     */
    public function getWallet(): Wallet
    {
        return $this->wallet;
    }
}