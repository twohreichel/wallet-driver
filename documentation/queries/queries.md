# MongoDB Queries

This documentation provides an overview of the basic ConnectionPool Functions with MongoDB in PHP.

## Methods
[Here](https://www.mongodb.com/docs/manual/reference/operator/query/) you will find an overview of filter options. Here is a simple example in which the username is filtered and the permitted outputs are limited to columns.


### List Collections
To list collections from a MongoDB database, use the `listCollections`-Method.

```php
<?php
$query->listCollections(
    $options
);
?>
```

### Create Collections
To create collections from a MongoDB database, use the `createCollections`-Method.

```php
<?php
$query->createCollections(
    $collectionName,
    $options
);
?>
```

### Select Collection
To select a collection from a MongoDB database, use the `selectCollection`-Method.

```php
<?php
$query->selectCollection(
    $collectionName,
    $options
);
?>
```

### Modify Collection
To modify a collection from a MongoDB database, use the `modifyCollection`-Method.

```php
<?php
$query->modifyCollection(
    $collectionName, 
    $collectionOptions, 
    $options
);
?>
```

### Drop Collection
To drop a collection from a MongoDB database, use the `dropCollection`-Method.

```php
<?php
$query->dropCollection(
    $collectionName,
    $options
);
?>
```


### Select

To query data from a MongoDB database, use the `select`-Method.

```php
<?php
$query->select(
    $collectionName,
    $filter,
    $options
);
?>
```

### Count

To count data from a MongoDB database, use the `count`-Method.

```php
<?php
$query->count(
    $collectionName,
    $filter,
    $options
);
?>
```

### Insert

To insert new data into a MongoDB database, use the `insertOne` or `insertMany` -Method.

```php
<?php
$data = [
    'username' => 'admin' . $i,
    'email' => 'admin@example' . $i . '.com',
    'name' => 'Admin User' . $i,
    'uuid' => $uuid,
    'pageInteractions' => $userInteraction,
    'age' => 33,
    'isActive' => true
];
$query->insertOne(
    $collectionName, 
    $data
);
?>
```

### Update

To update data into a MongoDB database, use the `updateOne` or `updateMany` -Method.

```php
<?php
$update = [
    'age' => 85,
    'isActive' => false
];
$filter = [
    'uuid' => 'user1',
];
$query->updateOne(
    $collectionName, 
    $filter, 
    $update,
    $options
);
?>
```

### Delete

To delete data from a MongoDB database, use the `deleteOne` or `deleteMany` -Method.

```php
<?php
$filter = [
    'uuid' => '1',
];
$query->deleteOne(
    $collectionName, 
    $filter
);
?>
```

---