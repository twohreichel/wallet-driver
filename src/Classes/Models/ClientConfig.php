<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Models;

class ClientConfig
{
    /**
     * @var object $client contains the client object
     */
    protected object $client;

    /**
     * @param object $client
     */
    public function __construct(object $client)
    {
        $this->setClient($client);
    }

    public function getClient(): object
    {
        return $this->client;
    }

    public function setClient(object $client): void
    {
        $this->client = $client;
    }
}