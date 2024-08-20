<?php

declare(strict_types=1);

namespace App;
final class DatabaseUrl
{
    private array $con;

    public function __construct()
    {
        $this->con = [
            'dbname' => 'users_db',
            'user' => 'user',
            'password' => 'pass',
            'host' => 'users-db',
            'port' => '3306',
            'driver' => 'pdo_mysql',
        ];
    }

    public function getConnectionDetails(): array
    {
        return $this->con;
    }
}
