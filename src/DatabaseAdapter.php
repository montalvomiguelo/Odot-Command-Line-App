<?php

namespace Acme;

use PDO;

class DatabaseAdapter {

    protected $connection;

    function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll($tableName)
    {
        try {
            return $this->connection->query('SELECT * FROM ' . $tableName)->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

    public function query($sql, $parameters)
    {
        try {
            return $this->connection->prepare($sql)->execute($parameters);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

}
