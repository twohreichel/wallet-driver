<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class Connection
{
    /**
     * @var ClientConfig $config The variable that holds the client configuration
     */
    protected ClientConfig $config;

    /**
     * @param ClientConfig $config
     */
    public function __construct(
        ClientConfig $config
    )
    {
        $this->setConfig($config);
    }

    public function getConfig(): ClientConfig
    {
        return $this->config;
    }

    public function setConfig(ClientConfig $config): void
    {
        $this->config = $config;
    }
}