<?php

declare(strict_types=1);

namespace App\Posts\Infrastructure;

use App\Posts\Domain\Post;
use App\Posts\Domain\PostRepositoryInterface;
use Doctrine\DBAL\Connection;
use DateTimeImmutable;

class PostRepository implements PostRepositoryInterface
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws \Exception
     */
    public function findPostById(int $id): ?Post
    {
        $query = 'SELECT * FROM posts WHERE id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery(); // For Doctrine DBAL 3.x, use executeQuery()

        $data = $result->fetchAssociative();

        if ($data) {
            return new Post(
                (int)$data['id'],
                $data['title'],
                $data['content'],
                (int)$data['user_id'],
                new DateTimeImmutable($data['created_at']),
                new DateTimeImmutable($data['updated_at'])
            );
        }

        return null;
    }

    /**
     * @throws \Exception
     */
    public function findPostByUserId(int $userId): array
    {
        $query = 'SELECT * FROM posts WHERE user_id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $userId);
        $result = $stmt->executeQuery(); // For Doctrine DBAL 3.x, use executeQuery()

        // Loop through the results and create Post objects
        while ($row = $result->fetchAssociative()) {
            $posts[] = new Post(
                (int)$row['id'],
                $row['title'],
                $row['content'],
                (int)$row['user_id'],
                new DateTimeImmutable($row['created_at']),
                new DateTimeImmutable($row['updated_at'])
            );
        }

        return $posts;
    }
}
