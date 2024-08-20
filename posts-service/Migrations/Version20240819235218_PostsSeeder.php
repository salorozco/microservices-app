<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819235218_PostsSeeder extends AbstractMigration
{
    private $userId1;
    private $userId2;

    public function getDescription(): string
    {
        return 'Add initial posts for users';
    }

    public function up(Schema $schema): void
    {
        $this->userId1 = '1'; // Replace with the actual UUIDs
        $this->userId2 = '2';

        // Insert posts for user 1
        $this->addSql("
            INSERT INTO posts (user_id, title, content, created_at, updated_at)
            VALUES
            ($this->userId1, 'User 1 Post 1', 'Content for post 1 by user 1', NOW(), NOW()),
            ($this->userId1, 'User 1 Post 2', 'Content for post 2 by user 1', NOW(), NOW()),
            ($this->userId1, 'User 1 Post 3', 'Content for post 3 by user 1', NOW(), NOW())
        ");

        // Insert posts for user 2
        $this->addSql("
            INSERT INTO posts (user_id, title, content, created_at, updated_at)
            VALUES
            ($this->userId2, 'User 2 Post 1', 'Content for post 1 by user 2', NOW(), NOW()),
            ($this->userId2, 'User 2 Post 2', 'Content for post 2 by user 2', NOW(), NOW()),
            ($this->userId2, 'User 2 Post 3', 'Content for post 3 by user 2', NOW(), NOW())
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM posts WHERE user_id IN (1, 2)");
    }
}
