<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Drivers;

use TWOH\WalletDriver\Queries\QueryInterface;

interface DriverInterface
{
    public function connect(): QueryInterface;

    public function test(): bool;
}