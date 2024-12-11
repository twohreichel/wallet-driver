<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Services;

interface WalletInterface
{
    public function styleWallet(): void;

    public function prefillWallet(): void;
}