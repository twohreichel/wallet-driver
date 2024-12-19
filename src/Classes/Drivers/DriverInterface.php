<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use TWOH\WalletDriver\Models\Account;
use TWOH\WalletDriver\Models\Wallet;

interface DriverInterface
{
    public function buildWallet(): string;

    public function connect(): void;

    public function setAccount(Account $account): void;

    public function getAccount(): Account;

    public function setWallet(Wallet $wallet): void;

    public function getWallet(): Wallet;
}