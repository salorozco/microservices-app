<?php

declare(strict_types=1);

namespace App\Comments\Infrastructure;

use App\Comments\Domain\Comment;
use App\Comments\Domain\CommentRepositoryInterface;
use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class CommentRepository implements CommentRepositoryInterface
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function findCommentById(int $id): ?Comment
    {
        $query = 'SELECT * FROM comments WHERE id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery(); // For Doctrine DBAL 3.x, use executeQuery()
        $data = $result->fetchAssociative();

        if ($data) {
            return new Comment(
                (int)$data['id'],
                (int)$data['post_id'],
                $data['content'],
                new DateTimeImmutable($data['created_at']),
                new DateTimeImmutable($data['updated_at'])
            );
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function findCommentsByPostIds(array $postIds): ?array
    {
        $placeholders = implode(',', array_fill(0, count($postIds), '?'));

        $query = "SELECT * FROM comments WHERE post_id IN ($placeholders)";
        $stmt = $this->connection->prepare($query);
        $result = $stmt->executeQuery($postIds);

        while ($row = $result->fetchAssociative()) {
            $comments[] = new Comment(
                (int)$row['id'],
                (int)$row['post_id'],
                $row['content'],
                new DateTimeImmutable($row['created_at']),
                new DateTimeImmutable($row['updated_at'])
            );
        }

        return $comments;
    }
}
