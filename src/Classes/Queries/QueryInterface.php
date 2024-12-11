<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Queries;

interface QueryInterface
{
    public function select(
        string $collectionName,
        array $filter,
        array $options = []
    ): array;

    public function count(
        string $collectionName,
        array $filter,
        array $options = []
    ): int;

    public function updateOne(
        string $collectionName,
        array $filter,
        array $update,
        array $options = []
    ): int;

    public function updateMany(
        string $collectionName,
        array $filter,
        array $update,
        array $options = []
    ): int;

    public function deleteOne(
        string $collectionName,
        array $filter,
        array $options = []
    ): int;

    public function deleteMany(
        string $collectionName,
        array $filter,
        array $options = []
    ): int;

    public function insertOne(
        string $collectionName,
        array $data,
        array $options = []
    ): mixed;

    public function insertMany(
        string $collectionName,
        array $data,
        array $options = []
    ): array;
}