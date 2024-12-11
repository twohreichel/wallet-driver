<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class Connection
{
    /**
     * @var string $token The variable that holds the token of the account.
     */
    protected string $token = '';

    /**
     * @param string $token
     */
    public function __construct(
        string $token
    )
    {
        $this->setToken($token);
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}