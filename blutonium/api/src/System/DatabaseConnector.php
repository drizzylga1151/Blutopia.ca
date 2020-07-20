<?php
namespace Src\System;

class DatabaseConnector {
    
    private $dbConnection = null;

    public function __construct()
    {
        $host = getenv('DBHOST');
        $db = getenv('DBUNAME');
        $user = getenv('DBUNAME');
        $password = getenv('DBPASSWORD');

        try {
            $this->dbConnection = new \PDO(
                "pgsql:host=$host;dbname=$db",
                $user,
                $password
            );

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

        
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}
