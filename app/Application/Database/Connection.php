<?php

namespace App\Application\Database;

class Connection implements ConnectionInterface
{
    private string $driver;
    private string $host;
    private int $port;
    private string $dbname;
    private string $user;
    private string $password;

    public function __construct()
    {
        $this->driver = 'mysql';
        $this->host = 'mysql_mvc';
        $this->port = '3306';
        $this->dbname = 'test';
        $this->user = 'test';
        $this->password = 'test';
    }

    public function connect(): \PDO
    {
        return new \PDO(
            "$this->driver:host=$this->host;port=$this->port;dbname=$this->dbname",
            $this->user,
            $this->password
        );
    }
}