<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use TWOH\WalletDriver\Models\Account;

interface DriverInterface
{
    public function buildWallet(): string;

    public function connect(): Account;

    public function setAccount(Account $account): void;

    public function getAccount(): Account;
}