<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Queries;

use MongoDB\Collection;
use MongoDB\Model\CollectionInfoIterator;
use MongoDB\Database;

final class MongoDbQuery implements QueryInterface
{
    /**
     * @var Database
     */
    private Database $connection;

    /**
     * @internal The connection can be only instantiated by its driver.
     */
    public function __construct(
        Database $connection
    )
    {
        $this->setConnection($connection);
    }

    /**
     * @param string $collectionName
     * @param array $filter
     * @param array $options
     * @return array
     */
    public function select(
        string $collectionName,
        array $filter,
        array $options = []
    ): array
    {
        return $this->getConnection()->selectCollection($collectionName)->find($filter, $options)->toArray();
    }

    /**
     * @param string $collectionName
     * @param array $filter
     * @param array $options
     * @return int
     */
    public function count(
        string $collectionName,
        array $filter,
        array $options = []
    ): int
    {
        return $this->getConnection()->selectCollection($collectionName)->countDocuments($filter, $options);
    }

    /**
     * @param string $collectionName
     * @param array $filter
     * @param array $update
     * @param array $options
     * @return int
     */
    public function updateOne(
        string $collectionName,
        array $filter,
        array $update,
        array $options = []
    ): int
    {
        return $this->getConnection()->selectCollection($collectionName)->updateOne($filter, $update, $options)->getMatchedCount();
    }

    /**
     * @param string $collectionName
     * @param array $filter
     * @param array $update
     * @param array $options
     * @return int
     */
    public function updateMany(
        string $collectionName,
        array $filter,
        array $update,
        array $options = []
    ): int
    {
        return $this->getConnection()->selectCollection($collectionName)->updateMany($filter, $update, $options)->getMatchedCount();
    }

    /**
     * @param string $collectionName
     * @param array $filter
     * @param array $options
     * @return int
     */
    public function deleteOne(
        string $collectionName,
        array $filter,
        array $options = []
    ): int
    {
        return $this->getConnection()->selectCollection($collectionName)->deleteOne($filter, $options)->getDeletedCount();
    }

    /**
     * @param string $collectionName
     * @param array $filter
     * @param array $options
     * @return int
     */
    public function deleteMany(
        string $collectionName,
        array $filter,
        array $options = []
    ): int
    {
        return $this->getConnection()->selectCollection($collectionName)->deleteMany($filter, $options)->getDeletedCount();
    }

    /**
     * @param string $collectionName
     * @param array $data
     * @param array $options
     * @return array|mixed
     */
    public function insertOne(
        string $collectionName,
        array $data,
        array $options = []
    ): mixed
    {
        return $this->getConnection()->selectCollection($collectionName)->insertOne($data, $options)->getInsertedId();
    }

    /**
     * @param string $collectionName
     * @param array $data
     * @param array $options
     * @return array
     */
    public function insertMany(
        string $collectionName,
        array $data,
        array $options = []
    ): array
    {
        return $this->getConnection()->selectCollection($collectionName)->insertMany($data, $options)->getInsertedIds();
    }

    /**
     * @param string $collectionName
     * @param array $options
     * @return Collection
     */
    public function selectCollection(
        string $collectionName,
        array $options = []
    ): Collection
    {
        return $this->getConnection()->selectCollection($collectionName, $options);
    }

    /**
     * @param string $collectionName
     * @param array $collectionOptions
     * @param array $options
     * @return object|array
     */
    public function modifyCollection(
        string $collectionName,
        array $collectionOptions,
        array $options = []
    ): object|array
    {
        return $this->getConnection()->modifyCollection($collectionName, $collectionOptions, $options);
    }

    /**
     * @param string $collectionName
     * @param array $options
     * @return object|array
     */
    public function dropCollection(
        string $collectionName,
        array $options = []
    ): object|array
    {
        return $this->getConnection()->dropCollection($collectionName, $options);
    }

    /**
     * @param string $collectionName
     * @param array $options
     * @return array|object
     */
    public function createCollection(
        string $collectionName,
        array $options = []
    ): array|object
    {
        return $this->getConnection()->createCollection($collectionName, $options);
    }

    /**
     * @param array $options
     * @return CollectionInfoIterator
     */
    public function listCollections(
        array $options = []
    ): CollectionInfoIterator
    {
        return $this->getConnection()->listCollections($options);
    }

    public function getConnection(): Database
    {
        return $this->connection;
    }

    public function setConnection(Database $connection): void
    {
        $this->connection = $connection;
    }
}