<?php

namespace TWOH\WalletDriver\Models;

interface ConfigurationInterface
{
    public function getUsername(): string;

    public function setUsername(string $username): void;

    public function getPassword(): string;

    public function setPassword(string $password): void;

    public function getHost(): string;

    public function setHost(string $host): void;

    public function getPort(): int;

    public function setPort(int $port): void;

    public function getDatabase(): string;

    public function setDatabase(string $database): void;
}