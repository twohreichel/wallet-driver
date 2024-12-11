<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Connection;

class GoogleWalletDriver implements DriverInterface
{
    /**
     * @var Account
     */
    protected Account $account;

    public function buildWallet(): string
    {
        $this->connect();

        return 'Google Wallet';
    }

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
}