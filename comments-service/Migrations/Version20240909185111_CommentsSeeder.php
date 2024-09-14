<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909185111_CommentsSeeder extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Comments Seeder';
    }

    public function up(Schema $schema): void
    {
        // Insert comments for all posts in one query
        $this->addSql("
            INSERT INTO comments (post_id, content, created_at, updated_at)
            VALUES
            (1, 'Comment 1 on post 1 by user 1', NOW(), NOW()),
            (1, 'Comment 2 on post 1 by user 1', NOW(), NOW()),
            (1, 'Comment 3 on post 1 by user 1', NOW(), NOW()),
            (2, 'Comment 1 on post 2 by user 1', NOW(), NOW()),
            (2, 'Comment 2 on post 2 by user 1', NOW(), NOW()),
            (2, 'Comment 3 on post 2 by user 1', NOW(), NOW()),
            (3, 'Comment 1 on post 3 by user 1', NOW(), NOW()),
            (3, 'Comment 2 on post 3 by user 1', NOW(), NOW()),
            (3, 'Comment 3 on post 3 by user 1', NOW(), NOW()),
            (4, 'Comment 1 on post 1 by user 2', NOW(), NOW()),
            (4, 'Comment 2 on post 1 by user 2', NOW(), NOW()),
            (4, 'Comment 3 on post 1 by user 2', NOW(), NOW()),
            (5, 'Comment 1 on post 2 by user 2', NOW(), NOW()),
            (5, 'Comment 2 on post 2 by user 2', NOW(), NOW()),
            (5, 'Comment 3 on post 2 by user 2', NOW(), NOW()),
            (6, 'Comment 1 on post 3 by user 2', NOW(), NOW()),
            (6, 'Comment 2 on post 3 by user 2', NOW(), NOW()),
            (6, 'Comment 3 on post 3 by user 2', NOW(), NOW())
        ");

    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM comments WHERE post_id IN (1, 2, 3, 4, 5, 6)");
    }
}
