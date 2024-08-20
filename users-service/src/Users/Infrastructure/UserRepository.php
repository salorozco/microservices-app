<?php

declare(strict_types=1);

namespace App\Users\Infrastructure;

use App\Users\Domain\User;
use App\Users\Domain\UserRepositoryInterface;
use Doctrine\DBAL\Connection;
use DateTimeImmutable;

class UserRepository implements UserRepositoryInterface
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findUserById(int $id): ?User
    {
        $query = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery(); // For Doctrine DBAL 3.x, use executeQuery()

        $data = $result->fetchAssociative();

        if ($data) {
            return new User(
                (int) $data['id'],
                $data['name'],
                $data['email'],
                new DateTimeImmutable($data['created_at']),
                new DateTimeImmutable($data['updated_at'])
            );
        }

        return null;
    }
}
