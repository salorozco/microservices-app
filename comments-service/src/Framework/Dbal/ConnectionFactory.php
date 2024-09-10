<?php

declare(strict_types=1);

namespace App\Framework\Dbal;

use App\DatabaseUrl;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

final class ConnectionFactory
{
    private DatabaseUrl $databaseUrl;

    public function __construct(DatabaseUrl $databaseUrl)
    {
        $this->databaseUrl = $databaseUrl;
    }

    /**
     * @throws Exception
     */
    public function create(): Connection
    {
        return DriverManager::getConnection(
            $this->databaseUrl->getConnectionDetails(),
            new Configuration()
        );
    }
}
